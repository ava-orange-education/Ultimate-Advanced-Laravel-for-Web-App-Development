if (! $request->user()?->tokenCan('api:write')) {
    throw new AccessDeniedHttpException('Write access required.');
}
