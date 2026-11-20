<?php

namespace Domain\Repositories;

use Domain\Models\User;
use Domain\ValueObjects\Email;

interface UserRepository
{
    public function save(User $user): void;

    public function findById(string $userId): ?User;

    public function findByEmail(Email $email): ?User;
}
