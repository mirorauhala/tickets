<?php

namespace Tests\Browser\Tests;

use Tikematic\Models\User;
use Tests\DuskTestCase;
use Tests\Browser\Pages\SignUpPage;
use Laravel\Dusk\Browser;
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
                'Street Address 402',
                '00100',
                'Postal Office LA',
                'Finland',
                'secret',
                'secret'
            ];

            $browser->visit(new SignUpPage)
                    ->signUp(...$details)
                    ->assertPathIs('/');
        });
    }
}
