<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort')->nullable()->default(0);
            $table->string('title')->nullable();
            $table->text('link')->nullable();
            $table->boolean('public')->nullable()->default(0);
            $table->tinyInteger('type')->nullable();
            $table->text('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baners');
    }
}
