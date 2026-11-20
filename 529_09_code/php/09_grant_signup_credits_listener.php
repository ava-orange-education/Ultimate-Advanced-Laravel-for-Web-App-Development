<?php

final class GrantSignupCreditsListener implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        $this->credits->grantToUser($event->userId);
    }
}
