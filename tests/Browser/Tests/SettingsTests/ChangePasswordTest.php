<?php

namespace Tests\Browser\Tests\SettingsTests;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SignInPage;
use Tests\Browser\Pages\SettingsChangePasswordPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ChangePasswordTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can change password.
     *
     * @return void
     */
    public function a_user_can_change_password()
    {
        $this->browse(function (Browser $first) {
            $user = factory(User::class)->create();
            $first->loginAs($user)
                    ->visit(new SettingsChangePasswordPage())
                    ->changePassword('secret', 'secret_new_password', 'secret_new_password')
                    ->assertPathIs('/settings/password')
                    ->click('#nav-dropdown')
                    ->click('#nav-logout')
                    ->assertGuest()
                    // try to log in with new password
                    ->visit(new SignInPage())
                    ->signIn($user->email, 'secret_new_password')
                    ->assertPathIs('/');
        });
    }
}
