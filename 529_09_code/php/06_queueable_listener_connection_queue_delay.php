<?php

Event::listen(queueable(function (UserRegistered $event) {
    // ...
})->onConnection('redis')
  ->onQueue('telemetry')
  ->delay(now()->plusSeconds(10)));
