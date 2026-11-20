<?php

namespace Domain\Services;

interface PasswordHasher
{
    public function hash(string $plainPassword): string;
}
