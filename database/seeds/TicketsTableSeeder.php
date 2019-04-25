<?php

use Illuminate\Database\Seeder;

use App\Models\Event;
use App\Models\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::find(1);
        $tickets = factory(Ticket::class)->times(3)->create(['event_id' => $event->id]);
    }
}
