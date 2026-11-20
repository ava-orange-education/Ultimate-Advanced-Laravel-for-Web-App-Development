<?php

final class RecalculateUserBalanceJob implements ShouldQueue
{
    public function __construct(
        public readonly int $userId
    ) {}
    public function handle(): void
    {
        // Recalculate and persist balance
    }
}
