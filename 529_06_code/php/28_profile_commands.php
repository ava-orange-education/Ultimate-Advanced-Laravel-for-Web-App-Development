<?php

final class EditUserProfileCommand
{
    public function __construct(
        public string $userId,
        public string $firstName,
        public string $lastName,
    ) {}
}

final class SubmitUserProfileCommand
{
    public function __construct(
        public string $userId,
    ) {}
}
