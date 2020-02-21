<?php

use Domain\Events\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class)->times(3)->create([
            'is_visible'  => 1,
            'is_featured' => 1,
        ]);
    }
}
