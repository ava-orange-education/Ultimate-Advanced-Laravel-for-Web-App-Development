<?php

namespace App\Services;

class TaxCalculatorService
{
    public function calculate(float $amount, float $tax): float
    {
        return $amount + ($amount * $tax / 100);
    }
}
