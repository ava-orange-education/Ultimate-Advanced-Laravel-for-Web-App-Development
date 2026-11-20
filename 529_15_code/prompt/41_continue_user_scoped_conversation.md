$response = (new PersonalAssistant)
    ->continue($conversationId, as: $user)
    ->prompt('Move the second item to tomorrow.');
