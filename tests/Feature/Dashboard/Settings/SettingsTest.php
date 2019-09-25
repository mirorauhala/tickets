<?php

namespace Tests\Feature\Dashboard\Settings;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->user->events()->attach($this->event);
        $this->uri = route('dashboard.settings', [$this->event]);
        $this->fields = [
            'name'        => 'Event name',
            'slug'        => 'slug',
            'location'    => 'Location',
            'url'         => 'http://event.test',
        ];
    }

    /** @test */
    public function user_can_edit_the_event()
    {
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionMissing('errors');
    }

    /** @test */
    public function event_name_is_required()
    {
        $this->fieldOverrides = [
            'name' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function event_slug_is_required()
    {
        $this->fieldOverrides = [
            'slug' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['slug']);
    }

    /** @test */
    public function event_location_is_required()
    {
        $this->fieldOverrides = [
            'location' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['location']);
    }

    /** @test */
    public function event_url_is_required()
    {
        $this->fieldOverrides = [
            'url' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['url']);
    }
}
