<?php

namespace Modules\Identity\Presentation\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Shared\Application\Bus\QueryBus;
use Modules\Identity\Application\Queries\FindUserByEmailQuery;

final class FindUserByEmailController
{
    public function __invoke(
        string $email,
        QueryBus $queries
    ): JsonResponse {
        $user = $queries->ask(
            new FindUserByEmailQuery($email)
        );

        if ($user === null) {
            return response()->json(
                ['message' => 'User not found'],
                404
            );
        }

        return response()->json($user);
    }
}
