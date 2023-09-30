<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAirTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_air_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('user_id');
            $table->string('ticket_id');
            $table->string('sit_type');
            $table->integer('payment_price');
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
        Schema::dropIfExists('book_air_tickets');
    }
}
