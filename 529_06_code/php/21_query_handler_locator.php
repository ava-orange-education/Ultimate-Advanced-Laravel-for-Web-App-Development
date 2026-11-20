<?php

namespace Modules\Shared\Infrastructure\Bus;

use Illuminate\Contracts\Container\Container;
use RuntimeException;

final class QueryHandlerLocator
{
    public function __construct(
        private readonly Container $container,
    ) {}

    public function resolveFor(object $query): callable
    {
        $handlerClass = $this->guessHandlerClass($query::class);

        if (! class_exists($handlerClass)) {
            throw new RuntimeException("Query handler not found: {$handlerClass}");
        }

        $handler = $this->container->make($handlerClass);

        if (! is_callable($handler)) {
            throw new RuntimeException("Query handler must be invokable: {$handlerClass}");
        }

        return $handler;
    }

    private function guessHandlerClass(string $queryClass): string
    {
        $handlerClass = str_replace('\\Application\\Queries\\', '\\Application\\Handlers\\', $queryClass);
        $handlerClass = preg_replace('/Query$/', 'Handler', $handlerClass) ?? $handlerClass;

        return $handlerClass;
    }
}
