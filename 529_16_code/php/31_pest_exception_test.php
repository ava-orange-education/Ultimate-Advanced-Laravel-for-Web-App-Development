<?php

it('throws an exception for negative tax values', function () {
    $service = new TaxCalculatorService();

    $service->calculate(100, -10);
})->throws(InvalidArgumentException::class);
