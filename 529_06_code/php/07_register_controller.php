<?php

namespace Modules\Identity\Presentation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Modules\Identity\Application\Commands\RegisterUserCommand;
use Modules\Shared\Application\Bus\CommandBus;

final class RegisterController
{
    public function __invoke(Request $request, CommandBus $bus): JsonResponse
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'min:2'],
            'last_name'  => ['required', 'string', 'min:2'],
            'email'      => ['required', 'email'],
            'password'   => ['required', 'string', 'min:8'],
        ]);

        $id = $bus->dispatch(new RegisterUserCommand(
            firstName: $data['first_name'],
            lastName:  $data['last_name'],
            email:     $data['email'],
            password:  $data['password'],
        ));

        return response()->json(['id' => $id], 201);
    }
}
