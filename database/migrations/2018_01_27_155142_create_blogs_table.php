<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id')->nullable()->default(0);
            $table->timestamps();
            $table->timestamp('date')->nullable()->useCurrent=true;
            $table->text('link');
            $table->text('title');
            $table->integer('sort')->nullable()->default(0);
            $table->longText('content')->nullable();
            $table->text('small_content')->nullable();
            $table->text('seo_content')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('url')->nullable();
            $table->boolean('public');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
