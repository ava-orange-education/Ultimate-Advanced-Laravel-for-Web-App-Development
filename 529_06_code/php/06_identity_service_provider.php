<?php

namespace App\Identity\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use App\Identity\Domain\Contracts\UserRepository;
use App\Identity\Infrastructure\Persistence\EloquentUserRepository;

final class IdentityServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }
}
