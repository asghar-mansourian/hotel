<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('region_id');
            $table->foreignId('country_id');

            $table->string('shop');
            $table->string('product_type');
            $table->unsignedBigInteger('quantity')->default(1);
            $table->unsignedDecimal('price')->default(0.00);
            $table->string('order_track');
            $table->string('order_date');
            $table->string('order_file')->nullable();
            $table->text('description')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('region_id')->on('regions')->references('id');
            $table->foreign('country_id')->on('countries')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
