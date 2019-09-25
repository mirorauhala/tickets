<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Tournament;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TournamentsUpdateTest extends TestCase
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
        $this->uri = route('dashboard.tournaments.update', [$this->event, $this->tournament]);
    }

    public function validationProvider()
    {
        $fields = [
            'name'               => 'CS:GO Tournament',
            'description'        => 'Long form text',
            'rules'              => 'Play fair',
            'registration_start' => \Carbon\Carbon::now(),
            'registration_end'   => \Carbon\Carbon::now()->addWeek(),
            'max_teams'          => 5,
            'team_min_size'      => 1,
            'team_max_size'      => 5,
        ];

        return [
            'user_can_create_a_tournament' => [
                'shouldPass'    => true,
                'data'          => $fields,
            ],
            'tournament_name_is_required' => [
                'shouldPass'    => false,
                'data'          => array_merge($fields, [
                    'name' => '',
                ]),
            ],
            'description_is_optional' => [
                'shouldPass'    => true,
                'data'          => array_merge($fields, [
                    'description' => '',
                ]),
            ],
            'rules_is_optional' => [
                'shouldPass'    => true,
                'data'          => array_merge($fields, [
                    'rules' => '',
                ]),
            ],
            'registration_start_is_required' => [
                'shouldPass'    => false,
                'data'          => array_merge($fields, [
                    'registration_start' => '',
                ]),
            ],
            'registration_end_is_required' => [
                'shouldPass'    => false,
                'data'          => array_merge($fields, [
                    'registration_end' => '',
                ]),
            ],
            'max_teams_is_required' => [
                'shouldPass'    => false,
                'data'          => array_merge($fields, [
                    'max_teams' => '',
                ]),
            ],
            'team_min_size_is_required' => [
                'shouldPass'    => false,
                'data'          => array_merge($fields, [
                    'team_min_size' => '',
                ]),
            ],
            'team_max_size_required' => [
                'shouldPass'    => false,
                'data'          => array_merge($fields, [
                    'team_max_size' => '',
                ]),
            ],
        ];
    }

    /** @dataProvider validationProvider */
    public function testHttp($shouldPass, $data)
    {
        $this->fields = $data;
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();

        if (true === $shouldPass) {
            $this->response->assertSessionDoesntHaveErrors();
        } else {
            $this->response->assertSessionHasErrors();
        }
    }
}
