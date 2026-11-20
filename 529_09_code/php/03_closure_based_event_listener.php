<?php

use Illuminate\Support\Facades\Event;
use Modules\Identity\Domain\Events\UserRegistered;
public function boot(): void
{
    Event::listen(UserRegistered::class, function (UserRegistered $event) {
        logger()->info('User registered', [
            'user_id' => $event->userId,
            'email'   => $event->email,
        ]);
    });
}
