<?php

public function test_negative_tax_percentage_throws_exception(): void
{
    $service = new TaxCalculatorService();

    $this->expectException(InvalidArgumentException::class);

    $service->calculate(100, -10);
}
