<?php

namespace App\Identity\Domain\Contracts;

interface UserRepository
{
    public function existsByEmail(string $email): bool;

    public function new(string $email, string $name, string $hashedPassword): object;

    public function save(object $user): void;
}
