<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SignUpPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/register';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Assert that user can log in.
     *
     * @return void
     */
    public function signUp(Browser $browser, $firstName = null, $lastName = null, $email = null, $password = null, $passwordConfirmation = null) {
        $browser->type('@first_name', $firstName)
            ->type('@last_name', $lastName)
            ->type('@email', $email)
            ->type('@password', $password)
            ->type('@password_confirmation', $passwordConfirmation)
            ->press('Register');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@first_name'               => '#first_name',
            '@last_name'                => '#last_name',
            '@email'                    => '#email',
            '@password'                 => '#password',
            '@password_confirmation'    => '#password_confirmation',
        ];
    }
}
