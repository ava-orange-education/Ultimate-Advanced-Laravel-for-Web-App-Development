$client->createTable([
    'TableName' => 'audit_logs',
    'AttributeDefinitions' => [
        // 'S' = String, 'N' = Number, 'B' = Binary
        ['AttributeName' => 'id', 'AttributeType' => 'S'], 
    ],
    'KeySchema' => [
        // 'HASH' represents the Partition Key
        ['AttributeName' => 'id', 'KeyType' => 'HASH'], 
    ],
    // Pay-per-request is often preferred for unpredictable workloads
    'BillingMode' => 'PAY_PER_REQUEST', 
]);