<?php

use Tikematic\Models\Ticket;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBooleansToIntegers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::table('tickets', function(Blueprint $table)
        {
            // add new columns
            $table->integer('reserved_new')->default(0)->after('reserved');
            $table->integer('maxAmountPerTransaction_new')->default(0)->after('maxAmountPerTransaction');
        });

        // add old data to new column
        $tickets = Ticket::all();
        if ($tickets) {
            foreach ($tickets as $ticket) {

                // set old data to new column
                $ticket->reserved_new = $ticket->reserved;
                $ticket->maxAmountPerTransaction_new = $ticket->maxAmountPerTransaction;

                // save the ticket
                $ticket->save();
            }
        }

        Schema::table('tickets', function(Blueprint $table)
        {
            // delete old column
            $table->dropColumn('reserved');
            $table->dropColumn('maxAmountPerTransaction');
        });

        Schema::table('tickets', function(Blueprint $table)
        {
            // rename new column to match old
            $table->renameColumn('reserved_new', 'reserved');
            $table->renameColumn('maxAmountPerTransaction_new', 'maxAmountPerTransaction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // IMPORTANT NOTE:
        // because renaming (enum) column types is not supported in laravel 4.2 (as mentioned here http://goo.gl/zU7zvw)
        // so we will make some changes in the order of the steps as follows:
        //
        // do the following steps in order:
        // 1- rename the exiting column
        // 2- add a new column with the desired data type and give it a name matches name of the existing column before renaming
        // 3- fill the new column with the appropriate data
        // 4- delete the old column

        Schema::table('tickets', function(Blueprint $table)
        {
            // rename the existing column
            $table->renameColumn('reserved', 'reserved_old');
            $table->renameColumn('maxAmountPerTransaction', 'maxAmountPerTransaction_old');
        });

        Schema::table('tickets', function(Blueprint $table)
        {
            // add a new column with the old data type
            $table->boolean('reserved')->default(0)->after('reserved_old');
            $table->boolean('maxAmountPerTransaction')->default(0)->after('maxAmountPerTransaction_old');
        });

        // fill with data
        // boolean (aka tinyint) can only have a max value somewhere between 0-255
        // but capping it to 100 for sanity
        $tickets = Ticket::all();
        if ($tickets) {
            foreach ($tickets as $ticket) {

                // for reserved column
                if($ticket->reserved_old > 100) {
                    $ticket->reserved = 100;
                } else {
                    $ticket->reserved = $ticket->reserved_old;
                }

                // for maxAmountPerTransaction column
                if($ticket->maxAmountPerTransaction_old > 100) {
                    $ticket->maxAmountPerTransaction = 100;
                } else {
                    $ticket->maxAmountPerTransaction = $ticket->maxAmountPerTransaction_old;
                }

                $ticket->save();
            }
        }

        Schema::table('tickets', function(Blueprint $table)
        {
            // delete old column
            $table->dropColumn('reserved_old');
            $table->dropColumn('maxAmountPerTransaction_old');
        });
    }
}
