<?php

namespace Tests\Browser\Tests\SettingsTests;

use Domain\User\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SettingsProfilePage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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
                '987654321',
            ];

            $browser->loginAs($user)
                    ->visit(new SettingsProfilePage())
                    ->updateProfile(...$updated_details)
                    ->assertInputValue('@first_name', 'Lady')
                    ->assertInputValue('@last_name', 'Gaga')
                    ->assertInputValue('@email', 'lady.gaga@testing.com')
                    ->assertInputValue('@phone', '987654321');
        });
    }
}
