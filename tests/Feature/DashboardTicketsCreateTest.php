<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTicketsCreateTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp()
    {
        parent::setUp();

        $this->createUser();
        $this->event = factory(Event::class)->create();
        $this->user->events()->attach($this->event);
        $this->uri = route('dashboard.tickets', [$this->event->slug]);
        $this->fields = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];
    }

    /** @test */
    public function user_can_create_a_ticket()
    {
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionMissing('errors');
    }

    /** @test */
    public function ticket_name_is_required()
    {
        $this->fieldOverrides = [
            'name' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function ticket_price_is_required()
    {
        $this->fieldOverrides = [
            'price' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['price']);
    }

    /** @test */
    public function ticket_vat_is_required()
    {
        $this->fieldOverrides = [
            'vat' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['vat']);
    }

    /** @test */
    public function ticket_reserved_is_required()
    {
        $this->fieldOverrides = [
            'reserved' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['reserved']);
    }

    /** @test */
    public function ticket_maxAmountPerTransaction_is_required()
    {
        $this->fieldOverrides = [
            'maxAmountPerTransaction' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['maxAmountPerTransaction']);
    }

    /** @test */
    public function ticket_availableAt_is_required()
    {
        $this->fieldOverrides = [
            'availableAt' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['availableAt']);
    }

    /** @test */
    public function ticket_unavailableAt_is_required()
    {
        $this->fieldOverrides = [
            'unavailableAt' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['unavailableAt']);
    }

    /** @test */
    public function ticket_is_seatable_is_required()
    {
        $this->fieldOverrides = [
            'is_seatable' => '',
        ];
        $this->actingAs($this->user)->doRequest('post');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['is_seatable']);
    }
}
