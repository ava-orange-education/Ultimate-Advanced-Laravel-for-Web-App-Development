<?php

declare(strict_types=1);

/**
 * Standalone demo inspired by Chapter 9.
 * It simulates a domain event, a queued listener, idempotency protection,
 * retry handling, and simple queue prioritization without requiring Laravel.
 */
final readonly class UserRegistered
{
    public function __construct(
        public int $userId,
        public string $email,
    ) {}
}

final class InMemoryIdempotencyStore
{
    private array $processed = [];

    public function alreadyProcessed(string $key): bool
    {
        return isset($this->processed[$key]);
    }

    public function markProcessed(string $key): void
    {
        $this->processed[$key] = true;
    }
}

final class Queue
{
    private array $queues = [
        'high' => [],
        'default' => [],
        'low' => [],
    ];

    public function push(string $queue, callable $job): void
    {
        $this->queues[$queue][] = $job;
    }

    public function work(array $priorityOrder): void
    {
        foreach ($priorityOrder as $queue) {
            while ($job = array_shift($this->queues[$queue])) {
                $job();
            }
        }
    }
}

final class GrantSignupCreditsListener
{
    public function __construct(
        private InMemoryIdempotencyStore $store,
        private array &$credits,
    ) {}

    public function handle(UserRegistered $event): void
    {
        $key = "signup-credit:{$event->userId}";

        if ($this->store->alreadyProcessed($key)) {
            echo "Skipped duplicate signup credit for user {$event->userId}\n";
            return;
        }

        $this->credits[$event->userId] = ($this->credits[$event->userId] ?? 0) + 100;
        $this->store->markProcessed($key);

        echo "Granted 100 signup credits to {$event->email}\n";
    }
}

$store = new InMemoryIdempotencyStore();
$queue = new Queue();
$credits = [];
$listener = new GrantSignupCreditsListener($store, $credits);

echo "Dispatching UserRegistered event...\n";
$event = new UserRegistered(42, 'john@example.com');

$queue->push('high', fn () => $listener->handle($event));
$queue->push('high', fn () => $listener->handle($event)); // duplicate retry simulation
$queue->push('low', fn () => print "Recorded telemetry for user {$event->userId}\n");

$queue->work(['high', 'default', 'low']);

echo "Final credits for user 42: {$credits[42]}\n";
