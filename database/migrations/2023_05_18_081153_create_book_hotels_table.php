<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('checking_in_date');
            $table->string('checking_out_date');
            $table->string('user_id');
            $table->string('hotel_id');
            $table->string('payment_price');
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
        Schema::dropIfExists('book_hotels');
    }
}
