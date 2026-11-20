<?php

public function findUser(int $id): ?User
{
    return User::find($id);
}
