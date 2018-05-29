<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAggrements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
        Schema::create('aggrements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->string('name',100);//not null
            $table->text('description')->nullable();
            $table->timestamps();
            $table->dateTime('expire_on')->nullable();
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
         Schema::dropIfExists('aggrements');
    }
}
