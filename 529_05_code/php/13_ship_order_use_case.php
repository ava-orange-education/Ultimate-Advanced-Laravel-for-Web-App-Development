<?php

final class ShipOrder
{
    public function __construct(
        private OrderRepository $orders
    ) {}

    public function handle(string $orderId): void
    {
        $order = $this->orders->getById($orderId);
        $order->ship();
        $this->orders->save($order);
    }
}
