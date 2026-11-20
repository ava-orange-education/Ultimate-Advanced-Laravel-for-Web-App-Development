<?php

final class Order
{
    private OrderStatus $status;

    public function pay(): void
    {
        if ($this->status->isPaid()) {
            throw new OrderAlreadyPaid();
        }

        $this->status = OrderStatus::paid();
    }

    public function ship(): void
    {
        if (! $this->status->isPaid()) {
            throw new CannotShipUnpaidOrder();
        }

        $this->status = OrderStatus::shipped();
    }
}
