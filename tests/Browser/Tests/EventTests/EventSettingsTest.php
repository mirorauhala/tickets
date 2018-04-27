<?php

namespace Tests\Browser\Tests\EventTests;

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\EventSettingsPage;
use Tests\DuskTestCase;

class EventSettingsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can edit event's settings.
     *
     * @return void
     */
    public function a_user_can_edit_events_settings()
    {
        $event = factory(Event::class)->create();
        $user = factory(User::class)->create();

        $user->events()->attach($event);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit(new EventSettingsPage())
                    ->editSettings(
                        'The Best Event of The Year',
                        'Milky Way, Earth',
                        'http://eventoftheyear.com/',
                        'EUR', // currency not available
                        '1' // visible
                    );
        });
    }
}
