<?php

use Laravel\Octane\Facades\Octane;
[$users, $invoices] = Octane::concurrently([
    fn () => User::latest()->take(10)->get(),
    fn () => Invoice::pending()->get(),
]);
