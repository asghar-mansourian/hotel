<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFieldsContentRuAndContentAzInTableFaqs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('title_az')->nullable();
            $table->string('title_ru')->nullable();

            $table->text('content_az')->nullable();
            $table->text('content_ru')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('title_az');
            $table->dropColumn('title_ru');

            $table->dropColumn('content_az');
            $table->dropColumn('content_ru');
        });
    }
}
