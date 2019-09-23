<?php

namespace Tests\Feature\Dashboard\Tickets;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketsEditTest extends TestCase
{
    use RefreshDatabase;

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        $this->createUser();
        $this->event  = factory(Event::class)->create();
        $this->ticket = factory(Ticket::class)->make();
        $this->user->events()->attach($this->event);
        $this->user->events->first()->tickets()->save($this->ticket);
        $this->uri    = route('dashboard.tickets.update', [$this->event, $this->ticket]);
        $this->fields = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
        ];
    }

    /** @test */
    public function user_can_edit_a_ticket()
    {
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionMissing('errors');
        $this->assertDatabaseHas('tickets', $this->fields);
    }

    /** @test */
    public function ticket_name_is_required()
    {
        $this->fieldOverrides = [
            'name' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function ticket_price_is_required()
    {
        $this->fieldOverrides = [
            'price' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['price']);
    }

    /** @test */
    public function ticket_vat_is_required()
    {
        $this->fieldOverrides = [
            'vat' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['vat']);
    }

    /** @test */
    public function ticket_reserved_is_required()
    {
        $this->fieldOverrides = [
            'reserved' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['reserved']);
    }

    /** @test */
    public function ticket_maxAmountPerTransaction_is_required()
    {
        $this->fieldOverrides = [
            'maxAmountPerTransaction' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['maxAmountPerTransaction']);
    }

    /** @test */
    public function ticket_availableAt_is_required()
    {
        $this->fieldOverrides = [
            'availableAt' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['availableAt']);
    }

    /** @test */
    public function ticket_unavailableAt_is_required()
    {
        $this->fieldOverrides = [
            'unavailableAt' => '',
        ];
        $this->actingAs($this->user)->doRequest('put');

        $this->response->assertRedirect();
        $this->response->assertSessionHasErrors(['unavailableAt']);
    }
}
