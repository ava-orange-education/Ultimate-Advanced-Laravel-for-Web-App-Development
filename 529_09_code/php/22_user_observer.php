<?php

namespace Modules\Identity\Infrastructure\Observers;
use Modules\Identity\Infrastructure\Persistence\Eloquent\Models\UserModel;
final class UserObserver
{
    public function created(UserModel $user): void
    {
        logger()->info('User persisted', [
            'id' => $user->id,
            'email' => $user->email,
        ]);
    }
    public function deleted(UserModel $user): void
    {
        logger()->warning('User deleted', [
            'id' => $user->id,
        ]);
    }
}
