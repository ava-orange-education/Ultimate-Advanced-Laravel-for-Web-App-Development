<?php

namespace Domain\Services;

interface PasswordVerifier
{
    public function verify(string $plainPassword, string $hashedPassword): bool;
}
