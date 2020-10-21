<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');

            $table->text('link');
            $table->unsignedDecimal('price')->default(0.00);
            $table->boolean('has_cargo')->default(false);
            $table->unsignedDecimal('cargo')->default(0.00);
            $table->unsignedBigInteger('quantity')->default(1);
            $table->string('description')->nullable();
            $table->unsignedDecimal('total')->default(0.00);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('order_id')->on('orders')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
