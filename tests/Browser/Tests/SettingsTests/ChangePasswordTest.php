<?php

namespace Tests\Browser\Tests\SettingsTests;

use Tikematic\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\{SettingsChangePasswordPage, SignInPage};
use Laravel\Dusk\Browser;
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

        $user = factory(User::class)->create();

        $this->browse(function (Browser $first, Browser $second) use ($user) {

            $first->loginAs($user)
                    ->visit(new SettingsChangePasswordPage)
                    ->changePassword("secret", "secret_new_password", "secret_new_password")
                    ->assertPathIs('/settings/password');

            // try to log in
            $second->visit(new SignInPage)
                    ->signIn($user->email, "secret_new_password")
                    ->assertPathIs('/');
        });
    }
}
