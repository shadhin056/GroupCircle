<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('livingIn')->nullable();
            $table->string('language')->nullable();
            $table->string('birthdayPlace')->nullable();
            $table->string('status')->nullable();
            $table->string('religion')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->text('socialNetwork')->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('basic_ups');
    }
}
