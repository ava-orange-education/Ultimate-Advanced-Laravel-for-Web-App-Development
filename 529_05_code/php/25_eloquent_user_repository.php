<?php

final class EloquentUserRepository implements UserRepository
{
    public function save(User $user): void
    {
        // map domain object to Eloquent model and persist
    }

    public function findByEmail(Email $email): ?User
    {
        // query database and rehydrate domain object
    }
}
