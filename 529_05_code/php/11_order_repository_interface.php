<?php

interface OrderRepository
{
    public function getById(string $orderId): Order;
    public function save(Order $order): void;
}
