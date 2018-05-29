<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
         Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//not null
            $table->dateTime('vacation_end_on')->nullable();
            $table->boolean('is_phone_varified')->default(0);
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
        Schema::dropIfExists('accounts');
    }
}
