<?php

public function handle(Request $request): Response
{
    $task = $request->user()
        ->tasks()
        ->whereKey($request->get('task_id'))
        ->firstOrFail();

    $this->authorize('view', $task);

    return Response::structured([
        'title' => $task->title,
        'status' => $task->completed_at ? 'completed' : 'open',
    ]);
}
