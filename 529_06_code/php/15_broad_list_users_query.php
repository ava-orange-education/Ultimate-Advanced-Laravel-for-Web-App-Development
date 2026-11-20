<?php

// Too broad and ambiguous
final readonly class ListUsersQuery
{
    public function __construct(
        public bool $includeInactive = false,
        public bool $withRoles = false,
    ) {}
}
