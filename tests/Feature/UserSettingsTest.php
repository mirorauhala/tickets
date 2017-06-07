<?php

namespace Tests\Feature;

use Tikematic\Model\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserSettingsTest extends TestCase
{
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
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "john.doe@email.com",
        ];

        $response = $this->actingAs($user)
                         ->post('/settings', $payload)
                         ->assertSessionMissing("errors");

        $response->assertStatus(200);
    }
}
