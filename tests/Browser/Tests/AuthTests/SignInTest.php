<?php

namespace Tests\Browser\Tests\AuthTests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SignInPage;
use Tests\DuskTestCase;

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
            'email' => 'john.doe@email.com',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new SignInPage())
                    ->signIn($user->email, 'secret')
                    ->assertPathIs('/');
        });
    }
}
