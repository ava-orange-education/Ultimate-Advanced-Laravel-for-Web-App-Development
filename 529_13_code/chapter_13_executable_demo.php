<?php

// Chapter 13 standalone demo: simulates redistributing bottlenecks,
// cached dashboard metrics, shared session configuration, and health checks.

final class FakeQueue
{
    private array $jobs = [];

    public function dispatch(string $jobName, array $payload = []): void
    {
        $this->jobs[] = ['job' => $jobName, 'payload' => $payload];
    }

    public function count(): int
    {
        return count($this->jobs);
    }

    public function process(): array
    {
        $processed = [];

        while ($job = array_shift($this->jobs)) {
            $processed[] = $job['job'];
        }

        return $processed;
    }
}

final class FakeCache
{
    private array $items = [];

    public function remember(string $key, int $seconds, callable $callback): mixed
    {
        if (! array_key_exists($key, $this->items)) {
            $this->items[$key] = $callback();
        }

        return $this->items[$key];
    }

    public function put(string $key, mixed $value): void
    {
        $this->items[$key] = $value;
    }

    public function forget(string $key): void
    {
        unset($this->items[$key]);
    }
}

$queue = new FakeQueue();
$cache = new FakeCache();

$user = ['id' => 101, 'email' => 'jane@example.com'];
$queue->dispatch('SendWelcomeEmailJob', $user);
$queue->dispatch('GenerateInvoiceJob', $user);

$cache->put('dashboard.metrics', [
    'users' => 42,
    'revenue' => 12500,
]);

$featuredProducts = $cache->remember('featured.products', 300, function () {
    return ['Keyboard', 'Monitor', 'USB-C Hub'];
});

$readWriteConfig = [
    'read_hosts' => ['read-db-1', 'read-db-2'],
    'write_host' => 'write-db',
    'sticky' => true,
];

$output = [
    'registration_response' => ['status' => 'created'],
    'queued_jobs' => $queue->count(),
    'processed_jobs' => $queue->process(),
    'dashboard_metrics' => $cache->remember('dashboard.metrics', 300, fn () => []),
    'featured_products' => $featuredProducts,
    'session_driver' => 'redis',
    'cache_driver' => 'redis',
    'database' => $readWriteConfig,
    'health_check' => ['status' => 'ok'],
];

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
