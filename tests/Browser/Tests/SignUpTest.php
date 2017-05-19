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
            $browser->visit(new SignUpPage)
                    ->signUp('John', 'Doe', 'john.doe@email.com', 'secret', 'secret')
                    ->assertPathIs('/');
        });
    }
}
