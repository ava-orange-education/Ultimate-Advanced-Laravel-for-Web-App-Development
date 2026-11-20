<?php

if (! $user->isAdministrator()) {
    abort(403);
}
