<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeveralMiniuteToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('min_address');
            $table->text('min_address_ru');
            $table->text('min_address_az');
            $table->text('walk');
            $table->text('walk_ru');
            $table->text('walk_az');
            $table->text('empty_room');
            $table->text('empty_room_ru');
            $table->text('empty_room_az');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['min_address','min_address_ru','min_address_az','walk','walk_ru','walk_az','empty_room','empty_room_ru','empty_room_az']);
        });
    }
}
