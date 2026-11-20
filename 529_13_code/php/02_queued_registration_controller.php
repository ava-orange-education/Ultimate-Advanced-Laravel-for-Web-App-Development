<?php

public function store(Request $request)
{
    $user = User::create($request->all());

    dispatch(new SendWelcomeEmailJob($user));
    dispatch(new GenerateInvoiceJob($user));

    return response()->json(['status' => 'created']);
}
