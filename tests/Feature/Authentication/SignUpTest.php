<?php

namespace Tests\Feature\Authentication;

use Tests\TestCase;
use Domain\User\User;
use App\Jobs\QueuedVerifyEmail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SignUpTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->uri    = '/register';
        $this->fields = [
            'first_name'            => 'John',
            'last_name'             => 'Doe',
            'email'                 => 'john.doe@email.com',
            'password'              => 'secret',
            'password_confirmation' => 'secret',
            'phone'                 => '0101001010',
        ];
    }

    /** @test */
    public function user_can_signup()
    {
        Queue::fake();
        $this->doRequest('post');
        $this->response->assertSessionMissing('errors');
        $this->assertAuthenticated();
        Queue::assertPushed(QueuedVerifyEmail::class);
    }

    /** @test */
    public function first_name_is_required()
    {
        $this->fieldOverrides = [
            'first_name' => '',
        ];
        $this->doRequest('post');
        $this->response->assertSessionHasErrors(['first_name']);
        $this->assertDatabaseMissing('users', [
            'email' => $this->fields()['email'],
        ]);
    }

    /** @test */
    public function last_name_is_required()
    {
        $this->fieldOverrides = [
            'last_name' => '',
        ];
        $this->doRequest('post');
        $this->response->assertSessionHasErrors(['last_name']);
        $this->assertDatabaseMissing('users', [
            'email' => $this->fields()['email'],
        ]);
    }

    /** @test */
    public function email_is_required()
    {
        $this->fieldOverrides = [
            'email' => '',
        ];
        $this->doRequest('post');
        $this->response->assertSessionHasErrors(['email']);
        $this->assertDatabaseMissing('users', [
            'email' => $this->fields()['email'],
        ]);
    }

    /** @test */
    public function password_is_required()
    {
        $this->fieldOverrides = [
            'password' => '',
        ];
        $this->doRequest('post');
        $this->response->assertSessionHasErrors(['password']);
        $this->assertDatabaseMissing('users', [
            'email' => $this->fields()['email'],
        ]);
    }

    /** @test */
    public function password_confirmation_is_required()
    {
        $this->fieldOverrides = [
            'password_confirmation' => '',
        ];
        $this->doRequest('post');
        $this->response->assertSessionHasErrors(['password']);
        $this->assertDatabaseMissing('users', [
            'email' => $this->fields()['email'],
        ]);
    }

    /** @test */
    public function phone_can_be_empty()
    {
        $this->fieldOverrides = [
            'phone' => '',
        ];
        $this->doRequest('post');
        $this->response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'email' => $this->fields()['email'],
        ]);
    }
}
