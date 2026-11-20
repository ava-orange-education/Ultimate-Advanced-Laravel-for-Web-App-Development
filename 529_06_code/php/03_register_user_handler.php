<?php

namespace App\Identity\Application\Handlers;

use App\Identity\Application\Commands\RegisterUser;
use App\Identity\Domain\Contracts\UserRepository;
use App\Identity\Domain\Services\PasswordHasher;

final class RegisterUserHandler
{
    public function __construct(
        private UserRepository $users,
        private PasswordHasher $hasher,
    ) {}

    public function handle(RegisterUser $command): void
    {
        // 1) business rule: email must be unique
        if ($this->users->existsByEmail($command->email)) {
            throw new \DomainException('Email is already registered.');
        }

        // 2) create a domain-level user entity (or a simple model wrapper)
        $user = $this->users->new(
            email: $command->email,
            name: $command->name,
            hashedPassword: $this->hasher->hash($command->password),
        );

        // 3) persist through repository (infrastructure stays hidden)
        $this->users->save($user);
    }
}
