<?php

use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
public function boot(): void
{
    Queue::failing(function (JobFailed $event) {
        logger()->critical('Global job failure', [
            'connection' => $event->connectionName,
            'job' => $event->job->resolveName(),
            'error' => $event->exception->getMessage(),
        ]);
    });
}
