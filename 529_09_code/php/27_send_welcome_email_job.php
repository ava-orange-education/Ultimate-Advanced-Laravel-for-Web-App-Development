<?php

namespace Modules\Identity\Application\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;
final class SendWelcomeEmailJob implements ShouldQueue
{
    public function __construct(
        public readonly int $userId
    ) {}
    public function handle(): void
    {
        // Resolve user and send email
    }
}
