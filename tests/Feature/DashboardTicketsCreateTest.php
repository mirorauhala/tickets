<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTicketsCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_ticket()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionMissing('errors');
    }

    /** @test */
    public function ticket_name_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => null,
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function ticket_price_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => null,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['price']);
    }

    /** @test */
    public function ticket_vat_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => null,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['vat']);
    }

    /** @test */
    public function ticket_reserved_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => null,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['reserved']);
    }

    /** @test */
    public function ticket_maxAmountPerTransaction_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => null,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['maxAmountPerTransaction']);
    }

    /** @test */
    public function ticket_availableAt_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => null,
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['availableAt']);
    }

    /** @test */
    public function ticket_unavailableAt_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => null,
            'is_seatable'             => 0,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['unavailableAt']);
    }

    /** @test */
    public function ticket_is_seatable_is_required()
    {
        $user = factory(User::class)->create();
        $event = factory(Event::class)->create();

        $user->events()->attach($event);

        $payload = [
            'name'                    => 'Entrance',
            'price'                   => 1000,
            'vat'                     => 10,
            'reserved'                => 10,
            'maxAmountPerTransaction' => 5,
            'availableAt'             => \Carbon\Carbon::now(),
            'unavailableAt'           => \Carbon\Carbon::now()->addWeek(),
            'is_seatable'             => null,
        ];

        $response = $this->actingAs($user)
                        ->post(route('dashboard.tickets', [$event]), $payload);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['is_seatable']);
    }
}
