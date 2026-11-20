<?php

use Illuminate\Queue\Middleware\WithoutOverlapping;
public function middleware(): array
{
    return [
        (new WithoutOverlapping($this->userId))->releaseAfter(10),
    ];
}
