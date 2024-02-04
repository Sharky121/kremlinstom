<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort')->nullable()->default(0);
            $table->boolean('public')->nullable()->default(0);
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->unsignedInteger('worker_id')->nullable()->default(0);

//            $table->primary('id');
            $table->index('worker_id');

            $table->foreign('worker_id')
                ->references('id')->on('workers')
                ->onDelete('cascade');
            /*$table->foreign('service_id')
                ->references('id')->on('services')
                ->onUpdate('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
