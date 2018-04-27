<?php

namespace Tests\Browser\Tests\AuthTests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SignUpPage;
use Tests\DuskTestCase;

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
                'secret',
            ];

            $browser->visit(new SignUpPage())
                    ->signUp(...$details)
                    ->assertPathIs('/');
        });
    }
}
