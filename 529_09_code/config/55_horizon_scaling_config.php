<?php

'production' => [
    'supervisor-1' => [
        'connection' => 'redis',
        'queue' => ['critical', 'default', 'telemetry'],
        'balance' => 'auto',
        'maxProcesses' => 20,
        'tries' => 3,
    ],
],
