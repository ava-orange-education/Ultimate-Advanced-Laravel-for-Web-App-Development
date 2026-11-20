<?php

namespace App\Mcp\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tool;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[Description('Returns a safe summary of a task by ID.')]
#[IsReadOnly]
final class GetTaskSummaryTool extends Tool
{
    public function schema(JsonSchema $schema): array
    {
        return [
            'task_id' => $schema->integer()
                ->description('The ID of the task.')
                ->required(),
        ];
    }

    public function handle(Request $request): Response
    {
        $validated = $request->validate([
            'task_id' => ['required', 'integer', 'exists:tasks,id'],
        ]);

        $task = $request->user()
            ->tasks()
            ->whereKey($validated['task_id'])
            ->firstOrFail();

        return Response::structured([
            'title' => $task->title,
            'status' => $task->completed_at ? 'completed' : 'open',
            'due_at' => optional($task->due_at)->toDateTimeString(),
        ]);
    }
}
