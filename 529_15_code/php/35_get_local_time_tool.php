<?php

namespace App\Ai\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class GetLocalTime implements Tool
{
    public function description(): Stringable|string
    {
        return 'Returns the current local date and time for the application.';
    }

    public function handle(Request $request): Stringable|string
    {
        return now()->toDateTimeString();
    }

    public function schema(JsonSchema $schema): array
    {
        return [];
    }
}
