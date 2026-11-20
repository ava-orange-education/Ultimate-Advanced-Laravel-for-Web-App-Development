$user = User::where('email', $email)->first();

$user->orders()->create([
    'amount' => 100,
]);