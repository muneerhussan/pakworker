<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAggrementService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aggrements_services', function (Blueprint $table) {
            $table->integer('service_id');//not null
            $table->integer('aggrement_id');//not null
            $table->string('rate_unit',50)->nullable();
            $table->decimal('rate')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aggrements_services');
    }
}
