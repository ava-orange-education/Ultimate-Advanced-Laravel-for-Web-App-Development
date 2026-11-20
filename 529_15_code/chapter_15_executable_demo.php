<?php

declare(strict_types=1);

/**
 * Chapter 15 standalone demo.
 *
 * This file does not require Laravel or an AI provider. It simulates the
 * chapter's PersonalAssistant flow: an assistant receives a prompt, may use
 * a local-time tool, and streams a response in small text chunks.
 */

final class GetLocalTime
{
    public function handle(): string
    {
        return '2026-06-21 10:30:00';
    }
}

final class TextDelta
{
    public function __construct(public readonly string $delta) {}
}

final class PersonalAssistant
{
    public function __construct(private readonly GetLocalTime $timeTool) {}

    /**
     * @return iterable<TextDelta>
     */
    public function stream(string $input): iterable
    {
        $message = str_contains(strtolower($input), 'time')
            ? 'The current local application time is '.$this->timeTool->handle().'.'
            : 'I can help with Laravel development tasks, code review, and safe AI-assisted workflows.';

        foreach (str_split($message, 16) as $chunk) {
            yield new TextDelta($chunk);
        }
    }
}

$assistant = new PersonalAssistant(new GetLocalTime());
$input = 'What is the current local time?';

echo "Personal Assistant\n";
echo "You: {$input}\n";
echo "Assistant: ";

foreach ($assistant->stream($input) as $event) {
    echo $event->delta;
}

echo PHP_EOL;
