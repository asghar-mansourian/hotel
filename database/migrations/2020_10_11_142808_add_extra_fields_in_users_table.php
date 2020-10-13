<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('region_id')->nullable();
            $table->bigInteger('code')->nullable();
            $table->string('phone')->unique();
            $table->string('serial_number')->unique();
            $table->string('citizenship');
            $table->string('birthdate');
            $table->tinyInteger('gender');
            $table->string('fin');
            $table->string('address');
            $table->decimal('balance')->default(0.00);

            $table->softDeletes();

            $table->foreign('region_id')->on('regions')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_region_id_foreign');
            $table->dropColumn('code');
            $table->dropColumn('phone');
            $table->dropColumn('serial_number');
            $table->dropColumn('citizenship');
            $table->dropColumn('birthdate');
            $table->dropColumn('gender');
            $table->dropColumn('fin');
            $table->dropColumn('address');
            $table->dropColumn('balance');
        });
    }
}
