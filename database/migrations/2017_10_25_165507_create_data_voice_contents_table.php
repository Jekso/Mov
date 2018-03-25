<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataVoiceContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_voice_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_voice_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->string('keyword')->index();
            $table->string('start_time');
            $table->string('end_time');
            $table->timestamps();
        });

        Schema::table('data_voice_contents', function (Blueprint $table){
            $table->foreign('data_voice_id')->references('id')->on('data_voices')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_voice_contents');
    }
}
