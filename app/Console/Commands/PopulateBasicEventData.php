<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PopulateBasicEventData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:dev-populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates basic event data for easy testing purposes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $event = factory(\App\Models\Event::class)->create([
            'name' => 'Connection Lan: eSports 2017',
            'location' => 'Alaseinäjoenkatu 15, 60220 Seinäjoki, Finland',
            'details' => 'Welcome to the ticket sales for Connection Lan: eSports 2017. In here you shall find event...',
            'url' => 'http://connectionlan.fi',
            'currency' => 'EUR',
        ]);

        $map = $event->maps()->create([
            'name' => 'First floor',
            'description' => 'This map actually is located on the second floor but we chose to keep it easier for people to understand that the event\'s maps don\'t start from the second floor and wonder where the first floor is.',
        ]);

        factory(\App\Models\User::class)->create([
            'first_name' => 'john',
            'last_name' => 'doe',
            'email' => 'john.doe@email.com',
            'password' => 'secret', // THIS IS FOR TESTING PURPOSES, NOT PRODUCTION
            'superuser' => true,
            'street_address' => 'Ankkalinnantie 13',
            'postal_code' => '00100',
            'postal_office' => 'Helsinki',
            'country_code' => 'FI',
        ]);
    }
}
