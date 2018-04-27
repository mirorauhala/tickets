<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class EventSettingsPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/event/admin/settings';
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
            '@event_name'               => '#event_name',
            '@event_location'           => '#event_location',
            '@event_url'                => '#event_url',
            //'@event_currency'         => '#event_currency', // support coming soon
        ];
    }

    /**
     * Assert that user can edit event's settings.
     *
     * @return void
     */
    public function editSettings(Browser $browser, $eventName = null, $eventLocation = null, $eventUrl = null, $eventCurrency = null, $eventVisibility = null)
    {
        $browser->type('@event_name', $eventName)
            ->type('@event_location', $eventLocation)
            ->type('@event_url', $eventUrl)
            //->type('@event_currency', $eventCurrency);
            ->radio('event_visibility', $eventVisibility)
            ->press('Update');

        $browser->assertInputValue('event_name', $eventName)
            ->assertInputValue('event_location', $eventLocation)
            ->assertInputValue('event_url', $eventUrl)
            ->assertInputValue('event_currency', $eventCurrency)
            ->assertRadioSelected('event_visibility', $eventVisibility);
    }
}
