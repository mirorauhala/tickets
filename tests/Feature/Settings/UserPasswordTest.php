<?php

namespace Tests\Feature\Settings;

use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->uri = '/settings/password';
        $this->fields = [
            'current_password'              => 'secret',
            'new_password'                  => 'newEnhancedPassword',
            'new_password_confirmation'     => 'newEnhancedPassword',
        ];
    }

    /** @test */
    public function user_can_update_password()
    {
        $this->actingAs($this->user)->doRequest('post');
        $this->response->assertSessionMissing('errors');
        $this->assertTrue(Hash::check($this->fields()['new_password'], $this->user->password));
    }

    /** @test */
    public function current_password_must_be_valid()
    {
        $this->fieldOverrides = [
            'current_password' => 'not a valid current password',
        ];

        $this->actingAs($this->user)->doRequest('post');
        $this->response->assertSessionHasErrors(['current_password']);
        $this->assertFalse(Hash::check($this->fields()['new_password'], $this->user->password));
    }

    /** @test */
    public function new_passwords_must_match()
    {
        $this->fieldOverrides = [
            'new_password_confirmation' => 'not a matching password',
        ];

        $this->actingAs($this->user)->doRequest('post');
        $this->response->assertSessionHasErrors(['new_password_confirmation']);
        $this->assertFalse(Hash::check($this->fields()['new_password'], $this->user->password));
    }

    /** @test */
    public function new_password_cant_be_old_password()
    {
        $this->fieldOverrides = [
            'new_password'                  => 'secret',
            'new_password_confirmation'     => 'secret',
        ];

        $this->actingAs($this->user)->doRequest('post');
        $this->response->assertSessionHasErrors(['new_password']);
        $this->assertTrue(Hash::check($this->fields()['current_password'], $this->user->password));
    }
}
