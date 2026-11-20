<?php

report_if(
    $response->failed(),
    new RuntimeException('Payment gateway unavailable.')
);
