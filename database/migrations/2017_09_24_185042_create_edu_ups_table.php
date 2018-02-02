<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edu_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->text('schools')->nullable();
            $table->text('college')->nullable();
            $table->text('highSchools')->nullable();
            $table->text('university')->nullable();
            $table->text('professionalSkills')->nullable();
            $table->text('personalSkills')->nullable();
            $table->text('technicalSkills')->nullable();
            $table->text('achievement')->nullable();
            $table->text('others')->nullable();
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
        Schema::dropIfExists('edu_ups');
    }
}
