<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
         Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//not null
            $table->integer('request_id');//not null
            $table->text('description')->nullable();
            $table->dateTime('delivery_time')->nullable();
            $table->string('rate_unit',25)->nullable();
            $table->decimal('rate')->default(0);
            $table->boolean('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}
