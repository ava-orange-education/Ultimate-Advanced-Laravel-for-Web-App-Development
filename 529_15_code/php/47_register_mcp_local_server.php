<?php

use App\Mcp\Servers\AssistantServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::local('assistant', AssistantServer::class);
