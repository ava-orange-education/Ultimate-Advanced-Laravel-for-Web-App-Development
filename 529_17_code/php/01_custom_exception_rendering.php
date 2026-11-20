<?php

use App\Exceptions\SubscriptionExpiredException;

public function render($request, Throwable $exception)
{
    if ($exception instanceof SubscriptionExpiredException) {
        return response()->json([
            'message' => 'Your subscription has expired.'
        ], 403);
    }

    return parent::render($request, $exception);
}
