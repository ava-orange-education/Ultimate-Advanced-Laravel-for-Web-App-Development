<?php

Bus::chain([
    new GenerateUserProfileJob($userId),
    new SendWelcomeEmailJob($userId),
])->onQueue('onboarding')->dispatch();
