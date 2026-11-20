return [
    'driver' => env('SESSION_DRIVER', 'database'),
    'lifetime' => 120,
    'expire_on_close' => false,
];