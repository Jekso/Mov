<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_id')->unsigned();
            $table->string('img');
            $table->timestamps();
        });

        Schema::table('data_images', function (Blueprint $table){
            $table->foreign('data_id')->references('id')->on('datas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_images');
    }
}
