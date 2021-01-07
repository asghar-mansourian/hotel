<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusUserIdInBoxItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('box_items', function (Blueprint $table) {
            $table->foreignId('has_send_sms')->nullable();
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('box_items', function (Blueprint $table) {
            $table->dropColumn('has_send_sms');
            $table->dropColumn('status');
        });
    }
}
