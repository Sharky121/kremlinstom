<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecializationWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialization_worker', function (Blueprint $table) {
            $table->unsignedInteger('specialization_id');
            $table->unsignedInteger('worker_id');
            $table->index('specialization_id');
            $table->index('worker_id');

            $table->foreign('specialization_id')
                ->references('id')->on('specializations')
                ->onDelete('cascade');

            $table->foreign('worker_id')
                ->references('id')->on('workers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialization_worker');
    }
}
