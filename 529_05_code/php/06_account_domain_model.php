<?php

final class Account
{
    public function approve(): void
    {
        if ($this->isApproved()) {
            throw new AccountAlreadyApproved();
        }

        $this->approvedAt = new DateTimeImmutable();
    }

    public function isApproved(): bool
    {
        return $this->approvedAt !== null;
    }
}
