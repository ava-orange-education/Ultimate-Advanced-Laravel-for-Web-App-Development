<?php

namespace App\Mcp\Prompts;

use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Prompt;

#[Description('Guides the AI client to analyze a task without modifying it.')]
final class AnalyzeTaskPrompt extends Prompt
{
    public function handle(Request $request): array
    {
        return [
            Response::text(
                'You are helping analyze a user task. Use read only tools only. Do not modify application data.'
            )->asAssistant(),

            Response::text(
                'Analyze the task summary and suggest the next best action.'
            ),
        ];
    }
}
