<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id')->nullable()->default(0);
            $table->unsignedInteger('type_id')->nullable()->default(1);
            $table->timestamps();
            $table->text('link');
            $table->text('title');
            $table->boolean('bottom');
            $table->integer('sort')->nullable()->default(0);
            $table->longText('content')->nullable();
            $table->text('small_content')->nullable();
            $table->text('seo_content')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_title')->nullable();
            $table->boolean('not_delete')->nullable()->default(0);
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
        Schema::dropIfExists('pages');
    }
}
