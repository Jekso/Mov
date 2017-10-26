<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assignment_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('comment');
            $table->timestamps();
        });

        Schema::table('assignment_comments', function (Blueprint $table){
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
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
        Schema::dropIfExists('assignment_comments');
    }
}
