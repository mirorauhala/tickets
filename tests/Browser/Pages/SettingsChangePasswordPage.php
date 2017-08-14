<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SettingsChangePasswordPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/settings/password';
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
    public function changePassword(Browser $browser,
        $current_password = null,
        $new_password = null,
        $new_password_confirmation = null
    ) {
        $browser->type('@current_password', $current_password)
            ->type('@new_password', $new_password)
            ->type('@new_password_confirmation', $new_password_confirmation)
            ->press('Change');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@current_password'             => '#current_password',
            '@new_password'                 => '#new_password',
            '@new_password_confirmation'    => '#new_password_confirmation',
        ];
    }
}
