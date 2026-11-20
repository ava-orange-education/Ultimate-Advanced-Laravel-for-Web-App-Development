AuditLog::query()
    ->where('event', 'user_registered')
    ->latest()
    ->limit(50)
    ->get();