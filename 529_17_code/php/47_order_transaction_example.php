<?php

DB::transaction(function () use ($order) {
    $order->update([
        'status' => 'completed',
    ]);

    $order->invoice()->create([
        'amount' => $order->total,
    ]);
});
