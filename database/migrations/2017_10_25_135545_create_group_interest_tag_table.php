<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupInterestTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_interest_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('interest_tag_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('group_interest_tag', function (Blueprint $table){
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('interest_tag_id')->references('id')->on('interest_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_interest_tag');
    }
}
