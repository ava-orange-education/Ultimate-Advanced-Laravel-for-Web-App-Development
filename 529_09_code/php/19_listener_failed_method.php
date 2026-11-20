<?php

public function failed(UserRegistered $event, \Throwable $exception): void
{
    // Log structured failure
    // Notify monitoring
    // Trigger compensating action
}
