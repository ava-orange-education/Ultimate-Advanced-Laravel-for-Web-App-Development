<?php

SendSecurityAlertJob::dispatch($data)->onQueue('high');
GenerateReportJob::dispatch($reportId)->onQueue('low');
