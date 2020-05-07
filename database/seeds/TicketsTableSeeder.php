<?php

use Domain\Events\Event;
use Domain\Tickets\Ticket;
use Illuminate\Database\Seeder;

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
