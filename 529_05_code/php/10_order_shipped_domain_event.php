<?php

final class OrderShipped
{
    public function __construct(public readonly string $orderId) {}
}

final class Order
{
    private array $events = [];

    public function ship(): void
    {
        // enforce business rules...

        $this->events[] = new OrderShipped($this->id);
    }

    public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}
