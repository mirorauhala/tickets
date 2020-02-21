<?php

use Domain\Users\User;
use Domain\Events\Event;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'customer@email.com',
        ]);
        $user = factory(User::class)->create([
            'email' => 'manager@email.com',
        ]);

        $event = factory(Event::class)->create();
        $user->events()->attach(Event::find(1));
    }
}
