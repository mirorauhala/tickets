<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSettingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_update_settings()
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
                         ->post('/settings', $payload);

        $response->assertSessionMissing('errors');
        $this->assertDatabaseHas('users', $payload);
    }

    /** @test */
    public function first_name_is_required()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'first_name' => '',
            'last_name' => 'Doe',
            'email' => 'john.doe@email.com',
        ];

        $response = $this->actingAs($user)
                         ->post('/settings', $payload);

        $response->assertSessionHasErrors(['first_name']);
        $this->assertDatabaseHas('users', $user->toArray());
    }

    /** @test */
    public function last_name_is_required()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'first_name' => 'John',
            'last_name' => '',
            'email' => 'john.doe@email.com',
        ];

        $response = $this->actingAs($user)
                         ->post('/settings', $payload);

        $response->assertSessionHasErrors(['last_name']);
        $this->assertDatabaseHas('users', $user->toArray());
    }

    /** @test */
    public function email_is_required()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => '',
        ];

        $response = $this->actingAs($user)
                         ->post('/settings', $payload);

        $response->assertSessionHasErrors(['email']);
        $this->assertDatabaseHas('users', $user->toArray());
    }

    /** @test */
    public function email_must_be_valid()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'not a valid email',
        ];

        $response = $this->actingAs($user)
                         ->post('/settings', $payload);

        $response->assertSessionHasErrors(['email']);
        $this->assertDatabaseHas('users', $user->toArray());
    }
}
