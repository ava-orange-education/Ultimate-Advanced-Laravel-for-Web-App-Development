<?php

class SendShipmentNotification
{
    public function messageGroup(): string
    {
        return 'shipments';
    }
    public function deduplicationId(): string
    {
        return "shipment-notification-{$this->shipment->id}";
    }
}
