<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SettingsChangeLanguagePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/settings/language';
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
     * Assert that user can change display language.
     *
     * @return void
     */
    public function changeLanguage(Browser $browser, $language = null)
    {
        $browser->select('@display_language', $language)
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
            '@display_language'             => 'display_language',
        ];
    }
}
