<?php

namespace Tests\Feature;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTicketsViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_tickets()
    {
        $user = factory(User::class)->create();
        $ticket = factory(Ticket::class)->create();

        $user->events()->attach($ticket->event);

        $response = $this->actingAs($user)
                        ->get(route('dashboard.tickets', [$ticket->event]));

        $response->assertSuccessful();
        $response->assertSeeText($ticket->name);
    }

    /** @test */
    public function authorization_required()
    {
        $user = factory(User::class)->create();
        $ticket = factory(Ticket::class)->create();

        $response = $this->actingAs($user)
                        ->get(route('dashboard.tickets', [$ticket->event]));

        $response->assertStatus(403);
    }
}
