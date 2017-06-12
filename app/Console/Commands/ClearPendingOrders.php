<?php

namespace Tikematic\Console\Commands;

use Log;
use Tikematic\Models\OrderItem;
use Illuminate\Console\Command;

class ClearPendingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:clear-pending-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will check for tickets that have exceeded their lock time.';

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
        // needs rework OrderItem::pending()->exceedingLockTime()->delete();
    }
}
