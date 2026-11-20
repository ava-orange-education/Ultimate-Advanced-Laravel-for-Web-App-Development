<?php

final class OrderStatus
{
    private function __construct(private string $value) {}

    public static function pending(): self
    {
        return new self('pending');
    }

    public static function paid(): self
    {
        return new self('paid');
    }

    public static function shipped(): self
    {
        return new self('shipped');
    }

    public function isPaid(): bool
    {
        return $this->value === 'paid';
    }

    public function isShipped(): bool
    {
        return $this->value === 'shipped';
    }
}
