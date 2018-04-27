<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('price')->unsigned();
            $table->integer('vat')->unsigned();
            $table->integer('reserved')->unsigned()->default(0);
            $table->boolean('maxAmountPerTransaction')->unsigned()->default(5);
            $table->dateTimeTz('availableAt');
            $table->dateTimeTz('unavailableAt');

            $table->boolean('is_seatable')->nullable()->default(0);

            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
