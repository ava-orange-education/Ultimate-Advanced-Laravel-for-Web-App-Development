ProjectModel::with([
    'tasks' => function ($query) {
        $query->withSum('timeSessions', 'duration_in_seconds');
    }
])->get();