<?php

use App\Mcp\Servers\AssistantServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::web('/mcp/assistant', AssistantServer::class)
    ->middleware(['auth:sanctum', 'throttle:mcp']);
