<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLanguageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_update_language()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'language' => 'fi',
        ];

        $response = $this->actingAs($user)
                        ->post('/settings/language', $payload);

        $response->assertSessionMissing('errors');
        $this->assertDatabaseHas('users', array_merge($user->toArray(), $payload));
    }

    /** @test */
    public function language_must_be_valid()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'language' => 'se',
        ];

        $response = $this->actingAs($user)
                        ->post('/settings/language', $payload);

        $response->assertSessionHasErrors(['language']);
        $this->assertDatabaseMissing('users', array_merge($user->toArray(), $payload));
    }
}
