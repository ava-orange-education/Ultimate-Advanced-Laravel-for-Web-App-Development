<?php

use App\Services\TaxCalculatorService;

it('calculates tax correctly', function () {
    $service = new TaxCalculatorService();

    $total = $service->calculate(100, 10);

    expect($total)->toBe(110.0);
});
