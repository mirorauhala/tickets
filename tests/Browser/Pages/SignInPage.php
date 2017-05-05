<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SignInPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
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
    public function signIn(Browser $browser, $email = null, $password = null) {
        $browser->visit(new SignInPage)
            ->type('@email', $email)
            ->type('@password', $password)
            ->press('Log In');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email'        => '#email',
            '@password'     => '#password',
        ];
    }
}
