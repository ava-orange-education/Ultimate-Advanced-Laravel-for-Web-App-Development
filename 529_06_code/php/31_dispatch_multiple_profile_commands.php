<?php

$commandBus->dispatchMultiple([
    new EditUserProfileCommand($id, $firstName, $lastName),
    new SubmitUserProfileCommand($id),
]);
