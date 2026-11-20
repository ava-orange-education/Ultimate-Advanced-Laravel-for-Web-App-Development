<?php

public function failed(\Throwable $exception): void
{
    logger()->error('Welcome email job failed', [
        'user_id' => $this->userId,
        'error' => $exception->getMessage(),
    ]);
}
