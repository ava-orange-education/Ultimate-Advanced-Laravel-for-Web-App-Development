<?php

event(new UserRegistered(
    userId: $user->id(),
    email: $user->email()->value(),
));
