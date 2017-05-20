<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class EventOrdersPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/event/admin';
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
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@adminTitle'        => '#adminTitle',
        ];
    }
}
