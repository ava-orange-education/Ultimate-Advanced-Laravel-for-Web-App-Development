<?php

if ($order->status !== 'paid') {
    throw new Exception('Order must be paid before shipping.');
}

$order->status = 'shipped';
$order->save();
