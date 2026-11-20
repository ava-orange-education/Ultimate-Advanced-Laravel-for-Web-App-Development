<?php

final class Order
{
    private OrderStatus $status;

    public function __construct(OrderStatus $status)
    {
        $this->status = $status;
    }

    public function ship(): void
    {
        if (! $this->status->isPaid()) {
            throw new CannotShipUnpaidOrder();
        }

        if ($this->status->isShipped()) {
            throw new OrderAlreadyShipped();
        }

        $this->status = OrderStatus::shipped();
    }

    public function status(): OrderStatus
    {
        return $this->status;
    }
}
