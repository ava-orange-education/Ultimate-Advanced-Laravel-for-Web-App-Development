<?php

User::creating(function (UserModel $user) {
    $user->uuid = (string) Str::uuid();
});
