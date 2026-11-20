<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows authenticated users to access the dashboard', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)
        ->getJson('/dashboard');

    $response
        ->assertOk()
        ->assertJson([
            'message' => 'Welcome to your dashboard.',
        ]);
});

it('redirects guests away from the dashboard', function () {
    $response = $this->get('/dashboard');

    $response->assertRedirect('/login');
});
