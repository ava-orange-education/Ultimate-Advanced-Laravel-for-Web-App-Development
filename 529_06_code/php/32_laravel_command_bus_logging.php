<?php

namespace Modules\Shared\Infrastructure\Bus;

use Modules\Shared\Application\Bus\CommandBus;
use Modules\Shared\Infrastructure\Persistence\TransactionManager;
use Psr\Log\LoggerInterface;
use Throwable;

final class LaravelCommandBus implements CommandBus
{
    public function __construct(
        private readonly CommandHandlerLocator $locator,
        private readonly TransactionManager $tx,
        private readonly LoggerInterface $logger,
    ) {}

    public function dispatch(object $command): mixed
    {
        $commandClass = $command::class;
        $startedAt = microtime(true);

        $this->logger->info('command.started', [
            'command' => $commandClass,
        ]);

        try {
            $handler = $this->locator->resolveFor($command);

            $result = $this->tx->run(
                fn () => $handler($command)
            );

            $this->logger->info('command.succeeded', [
                'command' => $commandClass,
                'duration_ms' => (int) ((microtime(true) - $startedAt) * 1000),
            ]);

            return $result;
        } catch (Throwable $e) {
            $this->logger->error('command.failed', [
                'command' => $commandClass,
                'duration_ms' => (int) ((microtime(true) - $startedAt) * 1000),
                'exception' => $e::class,
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}
