<?php

namespace Tests\Browser\Tests\AuthTests;

use App\Models\User;
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
                'Street Address 402',
                '00100',
                'Postal Office LA',
                'Finland',
                'secret',
                'secret',
            ];

            $browser->visit(new SignUpPage)
                    ->signUp(...$details)
                    ->assertPathIs('/');
        });
    }
}
