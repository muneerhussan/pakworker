<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
         Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);//not null
            $table->integer('parent_id');//default 0
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
        Schema::dropIfExists('categories');
    }
}
