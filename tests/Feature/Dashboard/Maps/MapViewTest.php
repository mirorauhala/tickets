<?php

namespace Tests\Feature\Dashboard;

use App\Models\Map;
use Tests\TestCase;
use Domain\User\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MapViewTest extends TestCase
{
    use RefreshDatabase;

    protected $map;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->map   = factory(Map::class)->create([
            'event_id' => $this->event->id,
        ]);
        $this->user->events()->save($this->event);
        $this->uri = route('dashboard.maps.index', [$this->event, $this->map]);
    }

    /** @test */
    public function user_can_view_maps()
    {
        $this->actingAs($this->user)->doRequest('get');

        $this->response->assertSuccessful();
        $this->response->assertSeeText($this->map->name);
    }

    /** @test */
    public function authorization_required()
    {
        // This user doesn't have authorization.
        $user = factory(User::class)->create();

        $this->actingAs($user)->doRequest('get');

        $this->response->assertStatus(403);
    }
}
