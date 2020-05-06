<?php

namespace Tests\Feature\Settings;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingsAccountTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->uri    = '/settings';
        $this->fields = [
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'john.doe@email.com',
            'phone'      => '+358000000000',
        ];
    }

    /** @test */
    public function user_can_update_settings()
    {
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionMissing('errors');
        $this->assertDatabaseHas('users', $this->fields);
    }

    /** @test */
    public function first_name_is_required()
    {
        $this->fieldOverrides = [
            'first_name' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['first_name']);
        $this->assertDatabaseHas('users', $this->user->toArray());
    }

    /** @test */
    public function last_name_is_required()
    {
        $this->fieldOverrides = [
            'last_name' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['last_name']);
        $this->assertDatabaseHas('users', $this->user->toArray());
    }

    /** @test */
    public function email_is_required()
    {
        $this->fieldOverrides = [
            'email' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['email']);
        $this->assertDatabaseHas('users', $this->user->toArray());
    }

    /** @test */
    public function email_must_be_valid()
    {
        $this->fieldOverrides = [
            'email' => 'must be a valid email address',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['email']);
        $this->assertDatabaseHas('users', $this->user->toArray());
    }

    /** @test */
    public function phone_is_optional()
    {
        $this->fieldOverrides = [
            'phone' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionMissing('errors');
        $this->assertDatabaseHas('users', $this->user->toArray());
    }
}
