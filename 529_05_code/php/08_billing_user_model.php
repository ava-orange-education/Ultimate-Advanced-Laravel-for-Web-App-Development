<?php

final class BillingUser
{
    public function __construct(
        private UserId $id,
        private Money $balance,
        private SubscriptionStatus $subscriptionStatus
    ) {}

    public function charge(Money $amount): void
    {
        if ($this->subscriptionStatus->isSuspended()) {
            throw new CannotChargeSuspendedAccount();
        }

        $this->balance = $this->balance->add($amount);
    }

    public function hasOutstandingBalance(): bool
    {
        return $this->balance->isPositive();
    }
}
