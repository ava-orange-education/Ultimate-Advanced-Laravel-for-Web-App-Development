<?php

namespace App\Identity\Infrastructure\Persistence;

use App\Identity\Domain\Contracts\UserRepository;

final class EloquentUserRepository implements UserRepository
{
    public function existsByEmail(string $email): bool
    {
        return \App\Models\User::query()->where('email', $email)->exists();
    }

    public function new(string $email, string $name, string $hashedPassword): object
    {
        $model = new \App\Models\User();
        $model->email = $email;
        $model->name = $name;
        $model->password = $hashedPassword;

        return $model;
    }

    public function save(object $user): void
    {
        $user->save();
    }
}
