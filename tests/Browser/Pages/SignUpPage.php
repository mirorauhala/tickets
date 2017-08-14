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
     * Assert that user can sign up.
     *
     * @return void
     */
    public function signUp(Browser $browser,
        $firstName = null,
        $lastName = null,
        $email = null,
        $streetAddress = null,
        $postalCode = null,
        $postalOffice = null,
        $countryCode = null,
        $password = null,
        $passwordConfirmation = null
    ) {
        $browser->type('@first_name', $firstName)
            ->type('@last_name', $lastName)
            ->type('@email', $email)
            ->type('@street_address', $streetAddress)
            ->type('@postal_code', $postalCode)
            ->type('@postal_office', $postalOffice)
            ->select('@country_code', $countryCode)
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
            '@street_address'           => '#street_address',
            '@postal_code'              => '#postal_code',
            '@postal_office'            => '#postal_office',
            '@country_code'             => '#country_code',
            '@password'                 => '#password',
            '@password_confirmation'    => '#password_confirmation',
        ];
    }
}
