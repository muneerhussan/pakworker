<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        Schema::create('currency', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',50)->nullable();
            $table->char('symbol',10)->nullable();
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
         Schema::dropIfExists('currency');
    }
}
