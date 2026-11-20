<?php

use Illuminate\Contracts\Queue\ShouldQueue;
final class SendWelcomeEmail implements ShouldQueue
{
    public int $tries = 3;
    public function handle(UserRegistered $event): void
    {
        // Send email...
    }
}
