<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('payments');
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('type' , 20)->default('cash')->comment('cash||online');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('price');
            $table->boolean('discount')->default(false);
            $table->string('authority');
            $table->string('refid');
            $table->string('status' , 10)->default(0);
            $table->string('ip' , 20)->nullable();
            $table->string('extra' , 100)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
