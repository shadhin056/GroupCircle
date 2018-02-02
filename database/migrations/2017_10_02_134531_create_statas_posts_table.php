<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatasPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statas_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->longText('status')->nullable();
            $table->string('whoSee')->nullable();
            $table->string('option')->nullable();
            $table->string('upload_photo')->nullable();
            $table->string('anonymous')->nullable();
            $table->string('post_time')->nullable();
            $table->string('imageId')->nullable();
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
        Schema::dropIfExists('statas_posts');
    }
}
