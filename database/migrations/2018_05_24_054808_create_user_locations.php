<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
         Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('model_type',['users','services'])->nullable();
            $table->integer('model_id');//not null
            $table->string('country_code',3)->nullable();
            $table->string('province',225)->nullable();
            $table->string('city',225)->nullable();
            $table->text('address')->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('long')->nullable();
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('locations');
    }
}
