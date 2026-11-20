<?php

use Illuminate\Support\Facades\Bus;
Bus::chain([
    new GenerateUserProfileJob($userId),
    new SendWelcomeEmailJob($userId),
    new DispatchOnboardingTelemetryJob($userId),
])->dispatch();
