<?php

Log::info('Order processed successfully', [
    'order_id' => $order->id,
    'user_id' => $user->id,
    'amount' => $order->total,
]);
