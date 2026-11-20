DB::transaction(function () use ($user, $orderData) {
    $order = $user->orders()->create($orderData);

    $user->decrement('balance', $order->amount);
});