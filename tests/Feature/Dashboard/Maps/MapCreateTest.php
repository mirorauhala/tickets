<?php

namespace Tests\Feature\Dashboard\Maps;

use Tests\TestCase;
use Domain\Events\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MapCreateTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->user->events()->attach($this->event);
        $this->uri = route('dashboard.maps.store', [$this->event]);
        $this->fields = [
            'name' => 'Map of 2018 event',
        ];
    }

    /** @test */
    public function user_can_create_a_map()
    {
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionMissing('errors');
    }

    /** @test */
    public function map_name_is_required()
    {
        $this->fieldOverrides = [
            'name' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['name']);
    }
}
