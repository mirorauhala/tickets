<?php

namespace Tests\Feature\Dashboard;

use App\Models\Map;
use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MapEditTest extends TestCase
{
    use RefreshDatabase;

    protected $map;
    protected $event;

    public function setUp()
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->map = factory(Map::class)->create([
            'event_id' => $this->event->id,
        ]);
        $this->user->events()->save($this->event);
        $this->fields = [
            'name'   => 'New map name',
            'active' => 1,
        ];

        $this->uri = route('dashboard.maps.edit', [$this->event, $this->map]);
    }

    /** @test */
    public function user_can_edit_maps()
    {
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->assertDatabaseHas('maps', array_merge($this->map->toArray(), $this->fields()));
    }

    /** @test */
    public function map_name_is_required()
    {
        $this->fieldOverrides = [
            'name' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function active_map_checkbox_can_be_unticked()
    {
        $this->fieldOverrides = [
            'active' => 0,
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasNoErrors();
    }

    /** @test */
    public function active_map_checkbox_must_be_able_to_be_cast_as_boolean()
    {
        $this->fieldOverrides = [
            'active' => null,
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertSessionHasErrors(['active']);
    }

    /** @test */
    public function authorization_required()
    {
        // This user doesn't have authorization.
        $user = factory(User::class)->create();

        $this->actingAs($user)->doRequest('post');

        $this->response->assertStatus(403);
    }
}
