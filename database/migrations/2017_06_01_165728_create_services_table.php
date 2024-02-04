<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id')->default(0);
            $table->text('link')->nullable();
            $table->text('title')->nullable();
            $table->boolean('public')->nullable()->default(0);
            $table->integer('sort')->default(0);
            $table->text('content')->nullable();
            $table->text('seo_content')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('services');
        Schema::enableForeignKeyConstraints();
    }
}
