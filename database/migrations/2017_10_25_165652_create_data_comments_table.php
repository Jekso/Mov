<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('comment');
            $table->timestamps();
        });

        Schema::table('data_comments', function (Blueprint $table){
            $table->foreign('data_id')->references('id')->on('datas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_comments');
    }
}
