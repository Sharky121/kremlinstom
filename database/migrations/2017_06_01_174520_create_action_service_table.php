<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_service', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('action_id');
            $table->index('service_id');
            $table->index('action_id');

            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');
            /*$table->foreign('service_id')
                ->references('id')->on('services')
                ->onUpdate('cascade');*/

            $table->foreign('action_id')
                ->references('id')->on('actions')
                ->onDelete('cascade');
            /*$table->foreign('action_id')
                ->references('id')->on('actions')
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
        Schema::dropIfExists('action_service');
    }
}
