<?php

namespace Tests\Browser\Tests\EventTests;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\EventOrdersPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventOrderTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test An organization admin can see event's orders.
     *
     * @return void
     */
    public function a_user_can_see_events_orders()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new EventOrdersPage())
                    ->assertSeeIn('@adminTitle', 'Orders');
        });
    }
}
