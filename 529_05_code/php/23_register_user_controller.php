<?php

final class RegisterUserController
{
    public function __construct(
        private RegisterUser $registerUser
    ) {}

    public function __invoke(RegisterUserRequest $request)
    {
        $this->registerUser->handle(
            RegisterUserData::fromRequest($request)
        );

        return response()->noContent();
    }
}
