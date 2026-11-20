<?php

try {
    $gateway->charge($order);
} catch (Throwable $exception) {
    report($exception);

    return $this->fallbackPaymentResponse();
}
