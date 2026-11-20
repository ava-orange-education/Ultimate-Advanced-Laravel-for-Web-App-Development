<?php

namespace Modules\Shared\Infrastructure\Bus;

use Illuminate\Contracts\Container\Container;
use Modules\Shared\Application\Bus\CommandBus;
use RuntimeException;

final class LaravelCommandBus implements CommandBus
{
    /**
     * @param array<class-string, class-string> $map Command => Handler
     */
    public function __construct(
        private Container $container,
        private array $map
    ) {}

    public function dispatch(object $command): mixed
    {
        $commandClass = $command::class;

        $handlerClass = $this->map[$commandClass] ?? null;

        if ($handlerClass === null) {
            throw new RuntimeException("No handler registered for command [{$commandClass}].");
        }

        $handler = $this->container->make($handlerClass);

        if (! method_exists($handler, 'handle')) {
            throw new RuntimeException("Handler [{$handlerClass}] must have a handle() method.");
        }

        return $handler->handle($command);
    }
}
