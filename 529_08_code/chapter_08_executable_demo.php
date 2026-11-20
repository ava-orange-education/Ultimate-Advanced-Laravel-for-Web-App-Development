<?php
/**
 * Chapter 8 executable demonstration.
 * Run: php chapter_08_executable_demo.php
 *
 * This standalone script mirrors the chapter's data-layer examples without requiring
 * a Laravel application or database connection. It demonstrates repository mapping,
 * aggregate-style output, batch iteration, and DynamoDB-style item formatting.
 */

declare(strict_types=1);

final class User
{
    public function __construct(
        public string $id,
        public string $email,
        public int $balance = 500
    ) {}
}

interface UserRepository
{
    public function findById(string $id): ?User;
    public function findByEmail(string $email): ?User;
    public function save(User $user): void;
}

final class InMemoryUserRepository implements UserRepository
{
    /** @var array<string, User> */
    private array $users = [];

    public function findById(string $id): ?User
    {
        return $this->users[$id] ?? null;
    }

    public function findByEmail(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->email === $email) {
                return $user;
            }
        }

        return null;
    }

    public function save(User $user): void
    {
        $this->users[$user->id] = $user;
    }
}

final class TransactionManager
{
    public function run(callable $callback): mixed
    {
        echo "Transaction started\n";
        try {
            $result = $callback();
            echo "Transaction committed\n";
            return $result;
        } catch (Throwable $e) {
            echo "Transaction rolled back: {$e->getMessage()}\n";
            throw $e;
        }
    }
}

$users = new InMemoryUserRepository();
$users->save(new User('usr_123', 'user@example.com'));

$found = $users->findByEmail('user@example.com');
echo "Repository lookup: {$found->id} {$found->email}\n";

$transaction = new TransactionManager();
$transaction->run(function () use ($found): void {
    $orderAmount = 100;
    $found->balance -= $orderAmount;
    echo "Created order amount: {$orderAmount}\n";
    echo "Updated balance: {$found->balance}\n";
});

$project = [
    'id' => 123,
    'name' => 'Project Alpha',
    'tasks' => [
        [
            'id' => 1,
            'title' => 'Implement API',
            'time_sessions_sum_duration_in_seconds' => 5400,
        ],
        [
            'id' => 2,
            'title' => 'Write Tests',
            'time_sessions_sum_duration_in_seconds' => 2700,
        ],
    ],
];

echo "Aggregate output:\n";
echo json_encode([$project], JSON_PRETTY_PRINT) . "\n";

$ids = range(1, 5);
echo "Chunked IDs: ";
foreach (array_chunk($ids, 2) as $chunk) {
    echo '[' . implode(',', $chunk) . ']';
}
echo "\n";

$dynamoItem = [
    'id' => ['S' => 'audit_001'],
    'event' => ['S' => 'user_registered'],
    'created_at' => ['S' => '2026-02-14T13:18:46Z'],
];

echo "DynamoDB-style item:\n";
echo json_encode($dynamoItem, JSON_PRETTY_PRINT) . "\n";
