<?php

namespace Modules\Shared\Infrastructure\Providers;

use Modules\Shared\Application\Bus\CommandBus;
use Modules\Shared\Infrastructure\Bus\LaravelQueryBus;
use Modules\Shared\Infrastructure\Bus\QueryHandlerLocator;

final class SharedServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        // The CommandBus and its corresponding CommandHandlerLocator
        // are registered here in the same way as their query counterparts.
 

        $this->app->singleton(QueryHandlerLocator::class);
        $this->app->singleton(QueryBus::class, LaravelQueryBus::class);
    }
}
