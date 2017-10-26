<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoungeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lounge_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lounge_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('comment');
            $table->timestamps();
        });

        Schema::table('lounge_comments', function (Blueprint $table){
            $table->foreign('lounge_id')->references('id')->on('lounges')->onDelete('cascade');
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
        Schema::dropIfExists('lounge_comments');
    }
}
