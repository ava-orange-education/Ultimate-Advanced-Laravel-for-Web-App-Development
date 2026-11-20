<?php

class ProcessSubscriptionRenewal implements ShouldQueue
{
    use Queueable;
    public function deduplicationId(): string
    {
        return "renewal-{$this->subscription->id}";
    }
}
