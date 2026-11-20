<?php

Log::error('Payment processing failed', [
    'user_id' => $user->id,
    'order_id' => $order->id,
    'gateway' => 'stripe',
]);
