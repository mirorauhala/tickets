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

        $visitorTicket = factory(\Tikematic\Models\Ticket::class)->create([
            'name' => 'Kävijälippu',
            'price' => 1500,
            'is_seatable' => 0,
            'event_id' => 1,
        ]);

        $gamerTicket = factory(\Tikematic\Models\Ticket::class)->create([
            'name' => 'Peruspaikka',
            'price' => 3500,
            'is_seatable' => 1,
            'event_id' => 1,
        ]);

        $proTicket = factory(\Tikematic\Models\Ticket::class)->create([
            'name' => 'Battery Premium',
            'price' => 7000,
            'is_seatable' => 1,
            'event_id' => 1,
        ]);

        $ultraTicket = factory(\Tikematic\Models\Ticket::class)->create([
            'name' => 'Battery Ultra',
            'price' => 9900,
            'is_seatable' => 1,
            'event_id' => 1,
        ]);

        $map = Map::find(1);
        // first row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1A' . $i,
                'status' => 'available',
                'top' => 200,
                'left' => 48 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1A' . ($i + 15),
                'status' => 'available',
                'top' => 215,
                'left' => 48 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }









        // first row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1B' . $i,
                'status' => 'available',
                'top' => 245,
                'left' => 48 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 15; $i++) {
            $map->seats()->create([
                'name' => '1B' . ($i + 15),
                'status' => 'available',
                'top' => 260,
                'left' => 48 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }







        // first row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1C' . $i,
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 285 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1C' . ($i + 4),
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 300 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }





        // first row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1D' . $i,
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 340 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1D' . ($i + 4),
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 355 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }





        // first row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1E' . $i,
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 397 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1E' . ($i + 4),
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 412 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }



        // first row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1F' . $i,
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 450 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1F' . ($i + 4),
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 465 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }




        // first row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1G' . $i,
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 500 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 4; $i++) {
            $map->seats()->create([
                'name' => '1G' . ($i + 4),
                'status' => 'available',
                'top' => 355 + $i * 15,
                'left' => 515 ,
                'ticket_id' => $gamerTicket->id,
            ]);
        }





        // first row of seats
        for($i = 1; $i <= 16; $i++) {
            $map->seats()->create([
                'name' => '1H' . $i,
                'status' => 'available',
                'top' => 260 ,
                'left' => 580 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 16; $i++) {
            $map->seats()->create([
                'name' => '1H' . ($i + 16),
                'status' => 'available',
                'top' => 275 ,
                'left' => 580 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }




        // first row of seats
        for($i = 1; $i <= 16; $i++) {
            $map->seats()->create([
                'name' => '1I' . $i,
                'status' => 'available',
                'top' => 305 ,
                'left' => 580 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 16; $i++) {
            $map->seats()->create([
                'name' => '1I' . ($i + 16),
                'status' => 'available',
                'top' => 320 ,
                'left' => 580 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // first row of seats
        for($i = 1; $i <= 16; $i++) {
            $map->seats()->create([
                'name' => '1J' . $i,
                'status' => 'available',
                'top' => 350 ,
                'left' => 580 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 16; $i++) {
            $map->seats()->create([
                'name' => '1J' . ($i + 16),
                'status' => 'available',
                'top' => 365 ,
                'left' => 580 + $i * 15,
                'ticket_id' => $gamerTicket->id,
            ]);
        }









        /////////////////////// ESPORTS KERROS

        // first row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2A' . $i,
                'status' => 'available',
                'top' => 700 ,
                'left' => 370 + $i * 15,
                'ticket_id' => $proTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2A' . ($i + 9),
                'status' => 'available',
                'top' => 715 ,
                'left' => 370 + $i * 15,
                'ticket_id' => $proTicket->id,
            ]);
        }



        // first row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2B' . $i,
                'status' => 'available',
                'top' => 745 ,
                'left' => 370 + $i * 15,
                'ticket_id' => $proTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2B' . ($i + 9),
                'status' => 'available',
                'top' => 760 ,
                'left' => 370 + $i * 15,
                'ticket_id' => $proTicket->id,
            ]);
        }



        // first row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2C' . $i,
                'status' => 'available',
                'top' => 790 ,
                'left' => 370 + $i * 15,
                'ticket_id' => $proTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2C' . ($i + 9),
                'status' => 'available',
                'top' => 805 ,
                'left' => 370 + $i * 15,
                'ticket_id' => $proTicket->id,
            ]);
        }





        // ULTRA SEATS


        // first row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2D' . $i,
                'status' => 'available',
                'top' => 890 ,
                'left' => 360 + $i * 15,
                'ticket_id' => $ultraTicket->id,
            ]);
        }

        // second row of seats
        for($i = 1; $i <= 9; $i++) {
            $map->seats()->create([
                'name' => '2D' . ($i + 9),
                'status' => 'available',
                'top' => 905 ,
                'left' => 360 + $i * 15,
                'ticket_id' => $ultraTicket->id,
            ]);
        }
    }

}
