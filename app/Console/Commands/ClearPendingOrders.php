<?php

namespace App\Console\Commands;

use Log;
use App\Models\Order;
use Illuminate\Console\Command;

class ClearPendingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:clear-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will check for orders that have exceeded their lock time and delete them.';

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
        // Get pending tickets that exceed their lock time and delete them
        // This will also delete the OrderItem via onDelete('cascade') in the
        // CreateOrderItemsTable migration
        Order::pending()->exceedingLockTime()->delete();
    }
}
