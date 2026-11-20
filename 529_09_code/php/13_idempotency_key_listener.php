<?php

public function handle(UserRegistered $event): void
{
    $key = "user_registered:{$event->userId}";
    if ($this->idempotencyStore->exists($key)) {
        return; // Already processed
    }
    $this->idempotencyStore->store($key);
    $this->credits->grantToUser($event->userId);
}
