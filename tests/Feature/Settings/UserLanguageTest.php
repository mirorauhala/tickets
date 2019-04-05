<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLanguageTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->createUser();
        $this->uri = '/settings/language';
        $this->fields = [
            'language' => 'fi',
        ];
    }

    /** @test */
    public function user_can_update_language()
    {
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionMissing('errors');
        $this->assertDatabaseHas('users', $this->fields());
    }

    /** @test */
    public function language_can_be_any_of_valid()
    {
        $options = ['none', 'fi', 'en'];
        foreach ($options as $option) {
            $this->fieldOverrides = [
                'language' => $option,
            ];
            $this->actingAs($this->user)->doRequest('post');
            $this->response->assertSessionMissing(['language']);
            $this->assertDatabaseHas('users', $this->fields());
        }
    }

    /** @test */
    public function language_can_not_be_invalid()
    {
        $this->fieldOverrides = [
            'language' => 'nonexistent',
        ];

        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['language']);
        $this->assertDatabaseMissing('users', $this->fields());
    }
}
