<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserPasswordTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_update_password()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'current_password'              => 'secret',
            'new_password'                  => 'newEnhancedPassword',
            'new_password_confirmation'     => 'newEnhancedPassword',
        ];

        $response = $this->actingAs($user)
                        ->post('/settings/password', $payload);

        $response->assertSessionMissing('errors');
        $this->assertTrue(Hash::check($payload['new_password'], $user->password));
    }

    /** @test */
    public function current_password_must_be_valid()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'current_password'              => 'not a valid password',
            'new_password'                  => 'newEnhancedPassword',
            'new_password_confirmation'     => 'newEnhancedPassword',
        ];

        $response = $this->actingAs($user)
                        ->post('/settings/password', $payload);

        $response->assertSessionHasErrors(['current_password']);
        $this->assertFalse(Hash::check($payload['new_password'], $user->password));
    }

    /** @test */
    public function new_passwords_must_match()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'current_password'              => 'secret',
            'new_password'                  => 'newEnhancedPassword',
            'new_password_confirmation'     => 'not matching other field',
        ];

        $response = $this->actingAs($user)
                        ->post('/settings/password', $payload);

        $response->assertSessionHasErrors(['new_password_confirmation']);
        $this->assertFalse(Hash::check($payload['new_password'], $user->password));
    }

    /** @test */
    public function new_password_cant_be_old_password()
    {
        // create user
        $user = factory(User::class)->create();

        // prepare settings form fill
        $payload = [
            'current_password'              => 'secret',
            'new_password'                  => 'secret',
            'new_password_confirmation'     => 'newEnhancedPassword',
        ];

        $response = $this->actingAs($user)
                        ->post('/settings/password', $payload);

        $response->assertSessionHasErrors(['new_password']);
        $this->assertFalse(Hash::check($payload['new_password_confirmation'], $user->password));
    }
}
