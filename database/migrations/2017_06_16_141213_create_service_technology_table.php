<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_technology', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('technology_id');
            $table->index('service_id');
            $table->index('technology_id');

            $table->foreign('service_id')
                ->references('id')->on('services')
                ->onDelete('cascade');

            $table->foreign('technology_id')
                ->references('id')->on('technologies')
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
        Schema::dropIfExists('service_technology');
    }
}
