<?php

namespace App\Ai\Agents;

use App\Ai\Tools\GetLocalTime;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class PersonalAssistant implements Agent, Conversational, HasTools
{
    use Promptable;

    public function instructions(): Stringable|string
    {
        return 'You are a helpful personal assistant.';
    }

    public function messages(): iterable
    {
        return [];
    }

    public function tools(): iterable
    {
        return [
            new GetLocalTime,
        ];
    }
}
