use Laravel\Passport\Passport;

Passport::tokensCan([
    'users:read'   => 'Read user data',
    'users:write'  => 'Modify user records',
    'orders:write' => 'Create orders',
]);
