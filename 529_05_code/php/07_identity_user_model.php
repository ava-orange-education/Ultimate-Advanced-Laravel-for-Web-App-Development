<?php

final class IdentityUser
{
    public function __construct(
        private UserId $id,
        private Email $email,
        private PasswordHash $password,
        private bool $isLocked
    ) {}

    public function lock(): void
    {
        $this->isLocked = true;
    }

    public function canAuthenticate(): bool
    {
        return ! $this->isLocked;
    }
}
