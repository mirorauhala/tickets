<?php

namespace Tikematic\Console\Commands;

use Illuminate\Console\Command;

class PopulateBasicEventData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tikematic:dev-populate';

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
        $event = factory(\Tikematic\Models\Event::class)->create([
            'name' => 'Connection Lan: eSports 2017',
            'location' => 'Alaseinäjoenkatu 15, 60220 Seinäjoki, Finland',
            'details' => 'Welcome to the ticket sales for Connection Lan: eSports 2017. In here you shall find event...',
            'url' => "http://connectionlan.fi",
            'currency' => "EUR",
        ]);

        $map = $event->maps()->create([
            'name' => 'First floor',
            'description' => 'This map actually is located on the second floor but we chose to keep it easier for people to understand that the event\'s maps don\'t start from the second floor and wonder where the first floor is.',
        ]);


        // first row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1A' . $i,
                'status' => 'available',
                'top' => 50,
                'left' => 20 * $i + 150,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1A' . ($i + 15),
                'status' => 'available',
                'top' => 70,
                'left' => 20 * $i + 150,
            ]);
        }

        factory(\Tikematic\Models\User::class)->create([
            'first_name' => 'john',
            'last_name' => 'doe',
            'email' => 'john.doe@email.com',
            'password' => 'secret', // THIS IS FOR TESTING PURPOSES, NOT PRODUCTION
            'superuser' => true,
        ]);
    }
}
