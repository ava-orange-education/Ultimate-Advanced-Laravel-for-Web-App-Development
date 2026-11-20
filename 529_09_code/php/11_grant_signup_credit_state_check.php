<?php

public function grantToUser(int $userId): void
{
    if ($this->repository->hasSignupCredit($userId)) {
        return;  // Already granted — safe to exit
    }
    $this->repository->createSignupCredit($userId);
}
