<?php

final readonly class FindUserByEmailQuery
{
    public function __construct(
        public string $email
    ) {}
}
