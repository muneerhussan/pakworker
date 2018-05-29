<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
          Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');//not null
            $table->integer('categorie_id');//not null
            $table->string('name',225);//not null
            $table->text('description')->nullable();
            $table->dateTime('delivery_time')->nullable();
            $table->string('rate_unit',25);//not null
            $table->decimal('rate');//not null
            $table->enum('status',['active','disabled'])->default('active');//not null and also set default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('requests');
    }
}
