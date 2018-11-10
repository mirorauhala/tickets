<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class EventTicketsPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/event/admin/tickets/new';
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
            '@adminTitle'               => '#adminTitle',
            '@ticket_name'              => '#ticket_name',
            '@ticket_price'             => '#ticket_price',
            '@ticket_vat'               => '#ticket_vat',
            '@ticket_reserved'          => '#ticket_reserved',
            '@ticket_max'               => '#ticket_max',
            '@ticket_sleepable'         => '#ticket_sleepable',
            '@ticket_availableAt'       => '#ticket_availableAt',
            '@ticket_unavailableAt'     => '#ticket_unavailableAt',
        ];
    }

    /**
     * Assert that user can create new tickets.
     *
     * @return void
     */
    public function createTicket(Browser $browser, $eventName = null, $eventLocation = null, $eventUrl = null, $eventCurrency = null, $eventVisibility = null)
    {
        $browser->type('@ticket_name', $eventName)
            ->type('@ticket_price', $eventLocation)
            ->type('@ticket_vat', $eventUrl)
            ->type('@ticket_reserved', $eventUrl)

            // figure out conditional checkboxes

            ->type('@ticket_availableAt', $eventUrl)
            ->check('ticket_unavailableAt', $eventVisibility)
            ->press('Create');

        $browser->assertInputValue('event_name', $eventName)
            ->assertInputValue('event_location', $eventLocation)
            ->assertInputValue('event_url', $eventUrl)
            ->assertInputValue('event_currency', $eventCurrency)
            ->assertRadioSelected('event_visibility', $eventVisibility);
    }
}
