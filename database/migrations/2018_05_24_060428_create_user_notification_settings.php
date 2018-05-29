<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNotificationSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
       public function up()
    {
          Schema::create('notification_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('sms_on_message')->default(0);
            $table->boolean('email_on_message')->default(1);
            $table->boolean('notification_on_message')->default(0);
            $table->boolean('sms_on_order')->default(0);
            $table->boolean('email_on_order')->default(1);
            $table->boolean('notification_on_order')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_settings');
    }
}
