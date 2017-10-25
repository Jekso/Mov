<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoungeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lounge_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lounge_id')->unsigned();
            $table->string('img');
            $table->timestamps();
        });

        Schema::table('lounge_images', function (Blueprint $table){
            $table->foreign('lounge_id')->references('id')->on('lounges')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lounge_images');
    }
}
