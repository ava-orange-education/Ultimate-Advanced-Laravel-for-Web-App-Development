<?php

DB::listen(function ($query) {
    if ($query->time > 500) {
        Log::warning('Slow query detected', [
            'sql' => $query->sql,
            'time' => $query->time,
        ]);
    }
});
