<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ru');
            $table->string('name_az');
            $table->text('title');
            $table->text('title_ru');
            $table->text('title_az');
            $table->text('description');
            $table->text('description_ru');
            $table->text('description_az');
            $table->string('telephone');
            $table->string('mobile');
            $table->text('address');
            $table->text('address_ru');
            $table->text('address_az');
            $table->integer('status')->default(0);
            $table->text('google_map_address');
            $table->string('indicator_picture');
            $table->string('up_indicator_picture');
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
        Schema::dropIfExists('projects');
    }
}
