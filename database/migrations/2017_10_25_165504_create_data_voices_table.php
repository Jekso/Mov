<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataVoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_voices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_id')->unsigned();
            $table->string('voice');
            $table->timestamps();
        });

        Schema::table('data_voices', function (Blueprint $table){
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
        Schema::dropIfExists('data_voices');
    }
}
