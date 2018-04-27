<?php

namespace Tests\Browser\Tests\SettingsTests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SettingsProfilePage;
use Tests\DuskTestCase;

class ProfileTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can update profile after sign up
     *
     * @return void
     */
    public function a_user_can_update_profile()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->resize(1920, 1500); // Width and Height

            $updated_details = [
                'Lady',
                'Gaga',
                'lady.gaga@testing.com',
                'Gagas street',
                '00200',
                'Postal Office GAGA',
                'sv',
            ];

            $browser->loginAs($user)
                    ->visit(new SettingsProfilePage())
                    ->updateProfile(...$updated_details)
                    ->assertInputValue('@first_name', 'Lady')
                    ->assertInputValue('@last_name', 'Gaga')
                    ->assertInputValue('@email', 'lady.gaga@testing.com')
                    ->assertInputValue('@street_address', 'Gagas street')
                    ->assertInputValue('@postal_code', '00200')
                    ->assertInputValue('@postal_office', 'Postal Office GAGA')
                    ->assertSelected('@country_code', 'sv');
        });
    }
}
