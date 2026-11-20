<?php

namespace App\Services;

use InvalidArgumentException;

class TaxCalculatorService
{
    public function calculate(float $amount, float $tax): float
    {
        if ($tax < 0) {
            throw new InvalidArgumentException(
                'Tax percentage cannot be negative.'
            );
        }

        return $amount + ($amount * $tax / 100);
    }
}
