<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools\GetApplicationStatusTool;
use Laravel\Mcp\Server;

final class AssistantServer extends Server
{
    protected array $tools = [
        GetApplicationStatusTool::class,
    ];
}
