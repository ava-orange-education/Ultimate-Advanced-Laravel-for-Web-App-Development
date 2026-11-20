<?php

namespace Infrastructure\Messaging;

use Domain\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;

final class SendWelcomeEmailOnUserRegistered implements ShouldQueue
{
    public function handle(UserRegistered $event): void
    {
        // Send a welcome email in response to the UserRegistered domain event
    }
}
