<?php

namespace Tests\Feature\Dashboard\Tournaments;

use Tests\TestCase;
use Domain\Users\User;
use Domain\Events\Event;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TournamentsDeleteTest extends TestCase
{
    use RefreshDatabase;

    protected $event;
    protected $tournament;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->tournament = factory(Tournament::class)->create();
        $this->user->events()->attach($this->event);
        $this->event->tournaments()->save($this->tournament);
        $this->uri = route('dashboard.tournaments.destroy', [$this->event, $this->tournament]);
    }

    /** @test */
    public function user_can_delete_tournament()
    {
        $this->actingAs($this->user)->doRequest('delete');

        $this->response->assertRedirect();
        $this->response->assertSessionMissing('errors');
    }

    /** @test */
    public function unauthorized_user_cannot_delete_tournament()
    {
        // This user doesn't have authorization.
        $user = factory(User::class)->create();

        $this->actingAs($user)->doRequest('delete');

        $this->response->assertStatus(403);
    }
}
