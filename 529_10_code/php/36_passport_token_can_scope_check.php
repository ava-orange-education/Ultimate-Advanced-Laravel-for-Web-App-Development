if (! $request->user()->tokenCan('users:write')) {
    abort(403, 'Insufficient scope.');
}
