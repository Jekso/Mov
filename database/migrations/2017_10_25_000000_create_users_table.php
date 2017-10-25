<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique()->index();
            $table->string('reset_password_token')->unique();
            $table->string('password');
            $table->string('api_token')->unique();
            $table->date('birth_date');
            $table->char('gender');
            $table->string('avatar');
            $table->text('bio');
            $table->integer('user_role_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table){
            $table->foreign('user_role_id')->references('id')->on('user_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
