<?php

namespace Infrastructure\Services;

use Domain\Services\PasswordHasher;
use Domain\Services\PasswordVerifier;
use Illuminate\Support\Facades\Hash;

final class BcryptPasswordHasher implements PasswordHasher, PasswordVerifier
{
    public function hash(string $plainPassword): string
    {
        return Hash::make($plainPassword);
    }

    public function verify(string $plainPassword, string $hashedPassword): bool
    {
        return Hash::check($plainPassword, $hashedPassword);
    }
}
