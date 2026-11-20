<?php

use Laravel\Octane\Facades\Octane;
Octane::tick('refresh-metrics', function () {
    app(MetricsRefresher::class)->refresh();
})->seconds(10)->immediate();
