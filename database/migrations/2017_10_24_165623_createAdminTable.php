<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            /*$table->string('gender')->nullable();;
            $table->string('verifyToken',100)->nullable();
            $table->rememberToken();
            $table->string('dateOfBirth')->nullable();;*/
            $table->boolean('statusVerify')->default('1');
            $table->string('phone')->nullable();
            $table->string('email',100)->unique();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('Admins');
    }
}
