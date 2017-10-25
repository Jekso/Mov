<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataImageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_image_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_image_id')->unsigned();
            $table->string('keyword')->index();
            $table->integer('vertices_1_x');
            $table->integer('vertices_1_y');
            $table->integer('vertices_2_x');
            $table->integer('vertices_2_y');
            $table->integer('vertices_3_x');
            $table->integer('vertices_3_y');
            $table->integer('vertices_4_x');
            $table->integer('vertices_4_y');
            $table->timestamps();
        });

        Schema::table('data_image_contents', function (Blueprint $table){
            $table->foreign('data_image_id')->references('id')->on('data_images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_image_contents');
    }
}
