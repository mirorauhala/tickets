<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use Domain\Users\User;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketsViewTest extends TestCase
{
    use RefreshDatabase;

    protected $ticket;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->ticket = factory(Ticket::class)->create();
        $this->user->events()->attach($this->ticket->event);
        $this->uri = route('dashboard.tickets.index', [$this->ticket->event]);
    }

    /** @test */
    public function user_can_view_tickets()
    {
        $this->actingAs($this->user)->doRequest('get');

        $this->response->assertSuccessful();
        $this->response->assertSeeText($this->ticket->name);
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
