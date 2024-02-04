<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('menu_id');
            $table->integer('read')->default(0);
            $table->integer('write')->default(0);
            $table->integer('delete')->default(0);

            $table->primary(array('user_id', 'menu_id'));
            $table->index('user_id');
            $table->index('menu_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('menu_id')
                ->references('id')->on('menu')
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
        Schema::dropIfExists('access');
    }
}
