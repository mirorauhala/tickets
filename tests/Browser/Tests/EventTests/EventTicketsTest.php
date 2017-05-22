<?php

namespace Tests\Browser\Tests\EventTests;

use Tikematic\Models\{Event, User};
use Tests\DuskTestCase;
use Tests\Browser\Pages\EventTicketsPage;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EvenTicketsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can create new tickets.
     *
     * @return void
     */
    public function a_user_can_create_new_tickets()
    {
        $event = factory(Event::class)->create();
        $user = factory(User::class)->create();

        $user->events()->attach($event);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit(new EventTicketsPage)
                    ->createTicket(
                        "The Best Event of The Year",
                        "Milky Way, Earth",
                        "http://eventoftheyear.com/",
                        "EUR", // currency not available
                        "1" // visible
                    );
        });
    }
}