<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tikematic\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSettingsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test A user can sign in.
     *
     * @return void
     */
    public function user_can_edit_own_settings()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@email.com',
        ];

        $response = $this->actingAs($user)
                         ->post('/settings', $payload)
                         ->assertSessionMissing('errors');

        $response->assertStatus(200);
    }
}
