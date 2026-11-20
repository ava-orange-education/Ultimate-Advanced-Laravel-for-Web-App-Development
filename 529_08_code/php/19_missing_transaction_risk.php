$order = $user->orders()->create($orderData);

// failure happens here

$user->decrement('balance', $order->amount);