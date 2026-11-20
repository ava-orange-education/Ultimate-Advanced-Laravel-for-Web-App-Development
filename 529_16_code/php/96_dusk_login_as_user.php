<?php

$this->browse(function (Browser $browser) use ($user) {
    $browser->loginAs($user)
        ->visit('/dashboard')
        ->assertSee('Dashboard');
});
