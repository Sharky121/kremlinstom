<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clinic_id')->nullable();
            $table->text('name');
            $table->integer('sort')->default(0);
            $table->boolean('public')->nullable()->default(0);
            $table->text('position')->nullable();
            $table->text('content')->nullable();
            $table->text('small_content')->nullable();
            $table->text('url')->nullable();
            $table->text('link')->nullable();



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
        Schema::dropIfExists('workers');
        Schema::enableForeignKeyConstraints();
    }
}
