<?php

final readonly class ListActiveUsersQuery
{
    public function __construct(
        public int $page = 1,
        public int $perPage = 20,
    ) {}
}

final readonly class ListUsersByRoleQuery
{
    public function __construct(
        public string $role,
        public int $page = 1,
        public int $perPage = 20,
    ) {}
}
