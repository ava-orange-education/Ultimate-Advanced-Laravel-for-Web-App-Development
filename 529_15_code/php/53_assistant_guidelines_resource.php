<?php

namespace App\Mcp\Resources;

use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Attributes\MimeType;
use Laravel\Mcp\Server\Attributes\Uri;
use Laravel\Mcp\Server\Resource;

#[Description('Guidelines for using the assistant tools safely.')]
#[Uri('assistant://resources/guidelines')]
#[MimeType('text/markdown')]
final class AssistantGuidelinesResource extends Resource
{
    public function handle(Request $request): Response
    {
        return Response::text(<<<'MARKDOWN'
# Assistant Guidelines

Use read only tools before suggesting changes.

Do not request sensitive values such as API keys, tokens, or passwords.

Do not perform destructive actions without explicit user confirmation.

Respect authorization and tenant boundaries.
MARKDOWN);
    }
}
