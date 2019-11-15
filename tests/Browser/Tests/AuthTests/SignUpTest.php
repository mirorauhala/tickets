<?php

namespace Tests\Browser\Tests\AuthTests;

use Domain\User\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SignUpPage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SignUpTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can sign up.
     *
     * @return void
     */
    public function a_user_can_sign_up()
    {
        $this->browse(function (Browser $browser) {
            $details = [
                'John',
                'Doe',
                'john.testing@email.com',
                'secret',
                'secret',
                '1234256789',
            ];

            $browser->visit(new SignUpPage())
                    ->signUp(...$details)
                    ->assertPathIs('/');
        });
    }
}
