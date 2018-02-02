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
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('email',100)->unique();
            $table->string('password')->nullable();
            $table->string('proPic')->nullable();
            $table->string('facebook_id',100)->unique()->nullable();
            $table->string('google_id',100)->unique()->nullable();
            $table->string('twitter_id',100)->unique()->nullable();
            $table->string('github_id',100)->unique()->nullable();
            $table->string('linkedin_id',100)->unique()->nullable();
            $table->boolean('statusVerify')->default('0');
            $table->string('verifyToken',100)->nullable();
            $table->rememberToken();
            $table->timestamps();
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
