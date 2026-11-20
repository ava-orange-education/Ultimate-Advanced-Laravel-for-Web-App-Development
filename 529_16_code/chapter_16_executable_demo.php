<?php

declare(strict_types=1);

/**
 * Standalone demo extracted for Chapter 16.
 * It demonstrates the TaxCalculatorService behavior used in the PHPUnit and Pest examples.
 * This file does not require Laravel.
 */

final class TaxCalculatorService
{
    public function calculate(float $amount, float $tax): float
    {
        if ($tax < 0) {
            throw new InvalidArgumentException('Tax percentage cannot be negative.');
        }

        return $amount + ($amount * $tax / 100);
    }
}

function assertSameValue(mixed $expected, mixed $actual, string $label): void
{
    if ($expected !== $actual) {
        throw new RuntimeException(sprintf(
            '%s failed. Expected %s, got %s',
            $label,
            var_export($expected, true),
            var_export($actual, true)
        ));
    }

    echo "PASS: {$label}\n";
}

$service = new TaxCalculatorService();

$total = $service->calculate(100, 10);
assertSameValue(110.0, $total, 'tax is calculated correctly');

try {
    $service->calculate(100, -10);
    throw new RuntimeException('negative tax exception was not thrown');
} catch (InvalidArgumentException $exception) {
    echo "PASS: negative tax throws InvalidArgumentException\n";
    echo "Message: {$exception->getMessage()}\n";
}

$items = ['task-1', 'task-2', 'task-3'];
assertSameValue(3, count($items), 'collection has expected item count');

echo "All standalone Chapter 16 demo checks passed.\n";
