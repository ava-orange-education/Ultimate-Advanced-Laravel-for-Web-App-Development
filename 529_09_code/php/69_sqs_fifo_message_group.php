<?php

ProcessOrder::dispatch($order)
    ->onGroup("customer-{$order->customer_id}");
