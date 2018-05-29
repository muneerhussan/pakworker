<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRateUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
         Schema::create('rate_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id');//not null
            $table->string('name',100);//not null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate_units');
    }
}
