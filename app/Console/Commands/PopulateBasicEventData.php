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
        factory(\Tikematic\Event::create([
            'name' => 'Connection Lan: eSports 2017',
            'location' => 'Alaseinäjoenkatu 15, 60220 Seinäjoki, Finland',
            'description' => 'Text used for SEO purposes.',
            'details' => 'Welcome to the ticket sales for Connection Lan: eSports 2017. In here you shall find event...',
            'url' => "http://connectionlan.fi",
        ]));
    }
}
