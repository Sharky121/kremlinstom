<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_worker', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('worker_id');
            $table->index('service_id');
            $table->index('worker_id');

            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            /*$table->foreign('service_id')
                ->references('id')->on('services')
                ->onUpdate('cascade');*/

            $table->foreign('worker_id')
                ->references('id')->on('workers')
                ->onDelete('cascade');
            /*$table->foreign('worker_id')
                ->references('id')->on('workers')
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
        Schema::dropIfExists('service_worker');
    }
}
