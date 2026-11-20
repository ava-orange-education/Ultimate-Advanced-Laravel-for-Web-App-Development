$client->putItem([
    'TableName' => 'audit_logs',
    'Item' => [
        // 'S' designates a String type
        'id'         => ['S' => (string) Str::uuid()], 
        'event'      => ['S' => 'user_registered'],
        // 'N' designates a Number type (sent as a string to maintain precision)
        'actor_id'   => ['N' => (string) $userId],
        'created_at' => ['N' => (string) time()],
    ],
]);