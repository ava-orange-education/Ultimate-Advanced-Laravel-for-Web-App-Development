<?php

namespace App\Identity\Application\Commands;

final readonly class RegisterUser
{
    public function __construct(
        public string $email,
        public string $password,
        public string $name,
    ) {}
}
