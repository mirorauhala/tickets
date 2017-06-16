<?php

namespace Tikematic\Console\Commands;

use Tikematic\Models\Map;
use Illuminate\Console\Command;

class ConnectionLanSeats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connectionlan:seats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates event seats';

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

        $map = Map::find(1);
        // first row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1A' . $i,
                'status' => 'available',
                'top' => 200,
                'left' => 48 + $i * 15,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1A' . ($i + 15),
                'status' => 'available',
                'top' => 215,
                'left' => 48 + $i * 15,
            ]);
        }
    }

}
