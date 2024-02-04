<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('author')->nullable();
            $table->integer('sort')->nullable()->default(0);
            $table->text('content')->nullable();
            $table->text('dop_content')->nullable();
            $table->boolean('public')->nullable()->default(0);
            $table->date('date')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
