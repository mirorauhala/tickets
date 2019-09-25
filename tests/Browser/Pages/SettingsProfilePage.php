<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SettingsProfilePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/settings';
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
     * Assert that user can change profile information.
     *
     * @return void
     */
    public function updateProfile(
        Browser $browser,
        $firstName = null,
        $lastName = null,
        $email = null,
        $phone = null
    ) {
        $browser->type('@first_name', $firstName)
            ->type('@last_name', $lastName)
            ->type('@email', $email)
            ->type('@phone', $phone)
            ->press('Update');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@first_name' => '#first_name',
            '@last_name'  => '#last_name',
            '@email'      => '#email',
            '@phone'      => '#phone',
        ];
    }
}
