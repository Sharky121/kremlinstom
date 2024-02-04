<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_service', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('disease_id');
            $table->index('service_id');
            $table->index('disease_id');

            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');
            /*$table->foreign('service_id')
                ->references('id')->on('services')
                ->onUpdate('cascade');*/

            $table->foreign('disease_id')
                ->references('id')->on('diseases')
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
        Schema::dropIfExists('disease_service');
    }
}
