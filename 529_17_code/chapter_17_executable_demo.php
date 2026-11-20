<?php

declare(strict_types=1);

final class Logger
{
    /** @var array<int, array<string, mixed>> */
    private array $records = [];

    public function info(string $message, array $context = []): void
    {
        $this->records[] = ['level' => 'info', 'message' => $message, 'context' => $context];
    }

    public function error(string $message, array $context = []): void
    {
        $this->records[] = ['level' => 'error', 'message' => $message, 'context' => $context];
    }

    public function dump(): array
    {
        return $this->records;
    }
}

final class ApiExceptionResponder
{
    public function render(Throwable $exception, bool $debug = false): array
    {
        $statusCode = $exception instanceof RuntimeException ? 403 : 500;

        $payload = [
            'success' => false,
            'message' => $statusCode >= 500 && ! $debug ? 'Server Error' : $exception->getMessage(),
        ];

        if ($debug) {
            $payload['exception'] = $exception::class;
        }

        return ['status' => $statusCode, 'body' => $payload];
    }
}

final class CacheLock
{
    private bool $locked = false;

    public function get(callable $callback): mixed
    {
        if ($this->locked) {
            return 'cache rebuild skipped because lock is already held';
        }

        $this->locked = true;

        try {
            return $callback();
        } finally {
            $this->locked = false;
        }
    }
}

$logger = new Logger();
$requestId = 'req-demo-001';

$logger->info('Order processed successfully', [
    'request_id' => $requestId,
    'order_id' => 1001,
    'user_id' => 42,
    'amount' => 149.95,
]);

try {
    throw new RuntimeException('Your subscription has expired.');
} catch (Throwable $exception) {
    $logger->error('Subscription validation failed', [
        'request_id' => $requestId,
        'user_id' => 42,
    ]);

    $apiError = (new ApiExceptionResponder())->render($exception);
}

$cacheLock = new CacheLock();
$cacheResult = $cacheLock->get(fn () => [
    'featured_products' => ['Laptop Stand', 'Mechanical Keyboard'],
    'generated_at' => '2026-06-01T12:00:00Z',
]);

$health = [
    'status' => 'healthy',
    'database' => 'connected',
    'cache' => 'available',
];

$output = [
    'logs' => $logger->dump(),
    'api_error_response' => $apiError,
    'cache_lock_result' => $cacheResult,
    'health_check' => $health,
];

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
