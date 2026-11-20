<?php

use Laravel\Ai\Enums\Lab;

$response = (new InvoiceAnalysisAgent)->prompt(
    prompt: 'Analyze this invoice dispute.',
    provider: Lab::Anthropic,
    model: 'claude-haiku-4-5-20251001',
    timeout: 120,
);
