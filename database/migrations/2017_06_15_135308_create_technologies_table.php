<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('technology_id')->default(0);
            $table->text('title');
            $table->string('link');
            $table->integer('sort')->nullable()->default(0);
            $table->longText('content')->nullable();
            $table->text('small_content')->nullable();
            $table->text('seo_content')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('url')->nullable();
            $table->boolean('public');
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
        Schema::dropIfExists('technologies');
    }
}
