<?php

final class EloquentOrderRepository implements OrderRepository
{
    public function getById(string $orderId): Order
    {
        // fetch from database and rehydrate domain object
    }

    public function save(Order $order): void
    {
        // persist domain object using ORM
    }
}
