<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNotificationMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id');
            $table->string('title')->nullable();
            $table->string('type')->default(1);
            $table->string('lang')->nullable();
            $table->text('content')->nullable();

            $table->foreign('notification_id')->on('notifications')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_messages');
    }
}
