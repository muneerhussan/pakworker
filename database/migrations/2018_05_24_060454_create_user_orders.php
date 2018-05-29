<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id');//not null
            $table->integer('buyer_id');//not null
            $table->text('address')->nullable();
            $table->decimal('lat')->nullable();
            $table->decimal('long')->nullable();
            $table->string('rate_unit',25)->nullable();
            $table->decimal('rate')->default(0);//default 0
            $table->boolean('is_completed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
