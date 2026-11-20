<?php

public function handle(): void
{
    if ($this->batch()?->cancelled()) {
        logger()->info('Batch cancelled. Job stopped.', [
            'job' => static::class,
            'batch_id' => $this->batch()->id,
        ]);
        return;
    }
    // Continue processing
}
