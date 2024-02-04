<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('parent')->nullable()->default(0);
            $table->string('type')->nullable();
            $table->integer('sort')->nullable()->default(0);
            $table->text('author')->nullable();
            $table->text('content')->nullable();
            $table->boolean('public')->nullable()->default(0);
            $table->text('video_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
