<?php

use Illuminate\Support\Facades\Bus;
Bus::batch([
    new GenerateUserReportJob($userId1),
    new GenerateUserReportJob($userId2),
    new GenerateUserReportJob($userId3),
])->dispatch();
