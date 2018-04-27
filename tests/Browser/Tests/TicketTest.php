<?php

namespace Tests\Browser\Tests\EventTests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\TicketsPage;
use Tests\DuskTestCase;

class TicketTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can sign in.
     *
     * @return void
     */
    public function a_user_can_see_tickets()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new TicketsPage())
                    ->assertPathIs('/event/tickets');
        });
    }
}
