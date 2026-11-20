<?php

namespace Modules\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Shared\Application\Bus\CommandBus;
use Modules\Shared\Infrastructure\Bus\LaravelCommandBus;
use Modules\Identity\Application\Commands\RegisterUserCommand;
use Modules\Identity\Application\Handlers\RegisterUserHandler;

final class BusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CommandBus::class, function ($app) {
            return new LaravelCommandBus($app, [
                RegisterUserCommand::class => RegisterUserHandler::class,
            ]);
        });
    }
}
