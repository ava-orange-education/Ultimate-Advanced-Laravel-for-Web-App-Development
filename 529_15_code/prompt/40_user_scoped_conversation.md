$response = (new PersonalAssistant)
    ->forUser($user)
    ->prompt('Help me plan my work for today.');

$conversationId = $response->conversationId;
