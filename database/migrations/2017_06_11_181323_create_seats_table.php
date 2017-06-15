<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('top')->nullable();
            $table->integer('left')->nullable();

            $table->integer('order_item_id')->unsigned()->nullable();
            $table->foreign('order_item_id')->references('id')->on('order_items');

            $table->integer('map_id')->unsigned();
            $table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');
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
        Schema::dropIfExists('seats');
    }
}
