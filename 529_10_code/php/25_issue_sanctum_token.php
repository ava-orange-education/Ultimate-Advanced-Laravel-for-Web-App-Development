$token = $user->createToken(
    'mobile-app',
    ['api:read', 'api:write']
)->plainTextToken;
