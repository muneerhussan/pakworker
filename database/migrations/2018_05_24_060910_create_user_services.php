<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id');//not null
            $table->integer('seller_id');//not null
            $table->string('name',225)->nullable();
            $table->text('description')->nullable();
            $table->string('rate_unit',25)->nullable();
            $table->decimal('rate')->nullable();
            $table->string('tags',500)->nullable();
            $table->float('rating')->default(0);//default 0
            $table->timestamps();
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
        Schema::dropIfExists('services');
    }
}
