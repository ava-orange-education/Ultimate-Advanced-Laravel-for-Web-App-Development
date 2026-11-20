// Modules\Shared\Application\Bus\CommandBus

public function dispatch(object $command): mixed
{
    $user = $this->request->user();

    if (! $user || ! $user->tokenCan('api:write')) {
        throw new AccessDeniedHttpException('Write access required.');
    }

    // Resolve and execute the command as implemented in previous chapters
}
