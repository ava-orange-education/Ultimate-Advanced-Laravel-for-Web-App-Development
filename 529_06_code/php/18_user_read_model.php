<?php

namespace Modules\Identity\Infrastructure\ReadModels;

use Illuminate\Support\Facades\DB;

final class UserReadModel
{
    public function findByEmail(string $email): ?array
    {
        $row = DB::table('users')
            ->select('id', 'first_name', 'last_name', 'email')
            ->where('email', $email)
            ->first();

        return $row ? (array) $row : null;
    }
}
