<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesResultDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_result_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedSmallInteger('correct_id');
            $table->unsignedSmallInteger('actual_id');

            $table->foreign('item_id')->references('id')->on('numbers_result_items');
            $table->foreign('correct_id')->references('id')->on('images');
            $table->foreign('actual_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_result_data');
    }
}
