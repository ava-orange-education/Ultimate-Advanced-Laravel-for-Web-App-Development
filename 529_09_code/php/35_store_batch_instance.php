<?php

$batch = Bus::batch([
    new GenerateUserReportJob($userId1),
    new GenerateUserReportJob($userId2),
])->dispatch();
