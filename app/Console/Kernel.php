<?php

namespace Tikematic\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Tikematic\Console\Commands\ClearPendingOrders::class,
        \Tikematic\Console\Commands\ConnectionLanSeats::class,
        \Tikematic\Console\Commands\PopulateBasicEventData::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // clear pending tickets that are exceeding their 30 minute lock down
        //$schedule->command('orders:clear-pending')
                  //->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
