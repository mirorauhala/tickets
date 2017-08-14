<?php

namespace Tests\Browser\Tests\AuthTests;

use Tikematic\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\SignInPage;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SignInTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can sign in.
     *
     * @return void
     */
    public function a_user_can_sign_in()
    {
        $user = factory(User::class)->create([
            'email'         => "john.doe@email.com",
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new SignInPage)
                    ->signIn($user->email, 'secret')
                    ->assertPathIs('/');
        });
    }
}
