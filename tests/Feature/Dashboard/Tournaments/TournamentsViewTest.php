<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TournamentViewTest extends TestCase
{
    use RefreshDatabase;

    protected $ticket;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->tournament = factory(Tournament::class)->create();
        $this->user->events()->attach($this->tournament->event);
        $this->uri = route('dashboard.tournaments.index', [$this->tournament->event]);
    }

    /** @test */
    public function user_can_view_tournaments()
    {
        $this->actingAs($this->user)->doRequest('get');

        $this->response->assertSuccessful();
        $this->response->assertSeeText($this->tournament->name);
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
