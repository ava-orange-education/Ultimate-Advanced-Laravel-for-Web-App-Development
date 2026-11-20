<?php

public function store(Request $request)
{
    $user = User::create($request->all());

    Mail::to($user->email)->send(new WelcomeMail($user));

    $pdf = app(InvoiceService::class)->generateFor($user);

    Storage::put("invoices/{$user->id}.pdf", $pdf);

    return response()->json(['status' => 'created']);
}
