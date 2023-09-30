<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('air_name');
            $table->string('start_location_id');
            $table->string('destination_location_id');
            $table->integer('economy_sit_number');
            $table->integer('economy_sit_price');
            $table->integer('business_sit_number');
            $table->integer('business_sit_price');
            $table->text('image');
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
        Schema::dropIfExists('air_tickets');
    }
}
