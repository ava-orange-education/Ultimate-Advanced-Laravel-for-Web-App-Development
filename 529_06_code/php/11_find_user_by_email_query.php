<?php

namespace App\Identity\Application\Queries;

final readonly class FindUserByEmail
{
    public function __construct(
        public string $email
    ) {}
}
