<?php

public function handle($request, Closure $next)
{
    Log::withContext([
        'request_id' => Str::uuid()->toString(),
    ]);

    return $next($request);
}
