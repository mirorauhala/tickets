<?php

namespace Tests\Browser\Tests;

use Tikematic\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\TicketsPage;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
            $browser->visit(new TicketsPage)
                    ->assertPathIs('/event/tickets');
        });
    }
}
