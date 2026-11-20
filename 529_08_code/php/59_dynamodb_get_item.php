$result = $client->getItem([
    'TableName' => 'audit_logs',
    'Key' => [
        'id' => ['S' => $id], // You must provide the full primary key
    ],
]);

// Accessing the data requires unwrapping the types:
$event = $result['Item']['event']['S'];