<?php
/**
 * Chapter 10 executable demo.
 * This standalone script simulates several API-layer concepts from the chapter
 * without requiring a full Laravel application.
 */

function userResource(array $user): array
{
    return [
        'id' => (string) $user['id'],
        'full_name' => trim($user['first_name'].' '.$user['last_name']),
        'email' => $user['email'],
        'created_at' => $user['created_at'],
    ];
}

function jsonLine(string $title, array $payload): void
{
    echo "## {$title}\n";
    echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)."\n\n";
}

$user = [
    'id' => '9b168661-3037-4d76-905c-37e408a286a1',
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'jdoe@example.com',
    'created_at' => '2024-03-20T15:00:00Z',
];

jsonLine('API Resource Response', [
    'data' => userResource($user),
]);

jsonLine('Validation Error Response', [
    'success' => false,
    'message' => 'The given data was invalid.',
    'errors' => [
        'email' => ['The email field is required.'],
    ],
]);

jsonLine('Sanctum Login Token Response', [
    'data' => [
        'token' => '1|zQJ7X8f1q...',
    ],
]);

function tokenCan(array $abilities, string $required): bool
{
    return in_array($required, $abilities, true);
}

$abilities = ['api:read', 'api:write'];
jsonLine('Token Ability Check', [
    'required' => 'api:write',
    'allowed' => tokenCan($abilities, 'api:write'),
]);

$limit = 60;
$used = 12;
jsonLine('Rate Limit Headers', [
    'X-RateLimit-Limit' => $limit,
    'X-RateLimit-Remaining' => $limit - $used,
]);
