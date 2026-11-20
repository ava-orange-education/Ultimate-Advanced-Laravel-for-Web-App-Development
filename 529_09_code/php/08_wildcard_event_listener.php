<?php

Event::listen('event.*', function (string $eventName, array $data) {
    // ...
});
