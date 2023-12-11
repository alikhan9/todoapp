<?php

use App\Models\User;

it('has tasks page', function () {
    // Create a new user
    $user = User::factory()->create();
    // Log in as the user
    $response = $this->actingAs($user)->get('/');
    // Assert that the response status code is 200
    $response->assertStatus(200);
});
