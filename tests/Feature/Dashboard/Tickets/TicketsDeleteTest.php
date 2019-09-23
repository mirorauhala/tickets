<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketsDeleteTest extends TestCase
{
    use RefreshDatabase;

    protected $map;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event  = factory(Event::class)->create();
        $this->ticket = factory(Ticket::class)->make();
        $this->user->events()->attach($this->event);
        $this->event->tickets()->save($this->ticket);
        $this->uri = route('dashboard.tickets.destroy', [$this->event, $this->ticket]);
    }

    /** @test */
    public function user_can_delete_tickets()
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
