<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sort')->nullable()->default(0);
            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->text('price')->nullable();
            $table->text('price_max')->nullable();
            $table->unsignedInteger('service_id')->nullable()->default(0);

            $table->index('service_id');

            $table->foreign('service_id')
                ->references('id')->on('services')
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
        Schema::dropIfExists('prices');
    }
}
