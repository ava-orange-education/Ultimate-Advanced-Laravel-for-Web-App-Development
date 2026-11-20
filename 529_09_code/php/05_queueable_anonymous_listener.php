<?php

use function Illuminate\Events\queueable;
use Illuminate\Support\Facades\Event;
use Modules\Identity\Domain\Events\UserRegistered;
Event::listen(queueable(function (UserRegistered $event) {
    // Lightweight async reaction
})->onQueue('low-priority'));
