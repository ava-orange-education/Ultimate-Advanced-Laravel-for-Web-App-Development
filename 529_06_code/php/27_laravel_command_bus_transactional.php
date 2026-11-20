<?php

namespace Modules\Shared\Infrastructure\Bus;

use Modules\Shared\Application\Bus\CommandBus;
use Modules\Shared\Infrastructure\Persistence\TransactionManager;

final class LaravelCommandBus implements CommandBus
{
    public function __construct(
        private readonly CommandHandlerLocator $locator,
        private readonly TransactionManager $tx,
    ) {}

    public function dispatch(object $command): mixed
    {
        $handler = $this->locator->resolveFor($command);

        return $this->tx->run(fn () => $handler($command));
    }
}
