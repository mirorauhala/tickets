<?php

namespace Tests\Browser\Tests\SettingsTests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SettingsChangeLanguagePage;
use Tests\DuskTestCase;

class ChangeLanguageTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can change password.
     *
     * @return void
     */
    public function a_user_can_change_language()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit(new SettingsChangeLanguagePage())
                    ->changeLanguage('fi')
                    ->assertPathIs('/settings/language')
                    ->assertSelected('display_language', 'fi');
        });
    }
}
