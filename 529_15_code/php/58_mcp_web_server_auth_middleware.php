<?php

Mcp::web('/mcp/assistant', AssistantServer::class)
    ->middleware(['auth:sanctum', 'throttle:mcp']);
