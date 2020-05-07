<?php

namespace Tests\Feature\Dashboard\Maps;

use Tests\TestCase;
use Domain\Maps\Map;
use Domain\Users\User;
use Domain\Events\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MapDeleteTest extends TestCase
{
    use RefreshDatabase;

    protected $map;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->map = $this->event->maps()->create(factory(Map::class)->raw());
        $this->user->events()->save($this->event);
        $this->uri = route('dashboard.maps.destroy', [$this->event, $this->map]);
    }

    /** @test */
    public function user_can_delete_maps()
    {
        $this->actingAs($this->user)->doRequest('delete');

        $this->response->assertRedirect();
        $this->response->assertSessionMissing('errors');
    }

    /** @test */
    public function authorization_required()
    {
        // This user doesn't have authorization.
        $user = factory(User::class)->create();

        $this->actingAs($user)->doRequest('delete');

        $this->response->assertStatus(403);
    }
}
