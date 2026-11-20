<?php

namespace Tests\Unit;

use App\Services\TaxCalculatorService;
use Tests\TestCase;

class TaxCalculatorTest extends TestCase
{
    public function test_tax_is_calculated_correctly(): void
    {
        // Arrange
        $service = new TaxCalculatorService();

        // Act
        $total = $service->calculate(100, 10);

        // Assert
        $this->assertEquals(110, $total);
    }
}
