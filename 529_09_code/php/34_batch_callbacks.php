<?php

Bus::batch([
    new GenerateUserReportJob($userId1),
    new GenerateUserReportJob($userId2),
])
->then(function ($batch) {
    // Executed when all jobs succeed
})
->catch(function ($batch, $exception) {
    // Executed on first failure
})
->finally(function ($batch) {
    // Always executed after completion
})
->dispatch();
