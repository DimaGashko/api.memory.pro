<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsResultDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words_result_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedSmallInteger('correct_id');
            $table->unsignedSmallInteger('actual_id');

            $table->foreign('item_id')->references('id')->on('words_result_items');
            $table->foreign('correct_id')->references('id')->on('words');
            $table->foreign('actual_id')->references('id')->on('words');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words_result_data');
    }
}