<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

public function boot(): void
{
    if (app()->isLocal()) {
        DB::listen(function ($query) {
            Log::debug('Query executed', [
                'sql' => $query->sql,
                'bindings' => $query->bindings,
                'time' => $query->time,
            ]);
        });
    }
}
