<?php

final class RegisterUser
{
    public function __construct(
        private UserRepository $users,
        private PasswordHasher $hasher
    ) {}

    public function handle(RegisterUserData $data): void
    {
        $user = User::register(
            $data->email,
            $this->hasher->hash($data->password)
        );

        $this->users->save($user);
    }
}
