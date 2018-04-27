<?php

namespace Tests\Browser\Tests\SettingsTests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SettingsChangePasswordPage;
use Tests\Browser\Pages\SignInPage;
use Tests\DuskTestCase;

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
                    ->visit(new SettingsChangePasswordPage())
                    ->changePassword('secret', 'secret_new_password', 'secret_new_password')
                    ->assertPathIs('/settings/password');

            // try to log in
            $second->visit(new SignInPage())
                    ->signIn($user->email, 'secret_new_password')
                    ->assertPathIs('/');
        });
    }
}
