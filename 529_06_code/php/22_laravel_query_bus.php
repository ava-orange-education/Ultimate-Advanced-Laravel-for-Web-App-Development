<?php

namespace Modules\Shared\Infrastructure\Bus;

use Modules\Shared\Application\Bus\QueryBus;

final class LaravelQueryBus implements QueryBus
{
    public function __construct(
        private readonly QueryHandlerLocator $locator,
    ) {}

    public function ask(object $query): mixed
    {
        $handler = $this->locator->resolveFor($query);

        return $handler($query);
    }
}
