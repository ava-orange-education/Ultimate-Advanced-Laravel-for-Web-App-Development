<?php

User::created(function (UserModel $user) {
    logger()->info('User created', ['id' => $user->id]);
});
