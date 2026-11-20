<?php

Event::listen(UserRegistered::class, function (UserRegistered $event) {
    $notifier = app(\Modules\Shared\Application\Services\AdminNotifier::class);
    $notifier->notifyNewUser($event->userId);
});
