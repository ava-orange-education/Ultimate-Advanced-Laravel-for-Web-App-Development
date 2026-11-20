<?php

$result = rescue(
    fn () => $weatherApi->forecast(),
    []
);
