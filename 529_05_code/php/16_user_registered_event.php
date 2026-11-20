<?php

namespace Domain\Events;

final class UserRegistered
{
    public function __construct(
        public readonly string $userId,
        public readonly string $email
    ) {}
}
