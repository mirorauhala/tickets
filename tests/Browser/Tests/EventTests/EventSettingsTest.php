<?php

namespace Tests\Browser\Tests\EventTests;

use Tikematic\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\EventSettingsPage;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventSettingsTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can edit event's settings.
     *
     * @return void
     */
    public function a_user_can_edit_event_settings()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new EventSettingsPage)
                    ->editSettings();
        });
    }
}
