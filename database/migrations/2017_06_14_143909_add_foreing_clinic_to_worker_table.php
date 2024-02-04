<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingClinicToWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('workers')) {
            if (!Schema::hasColumn('workers', 'faq')) {
                Schema::table('workers', function ($table) {
                    $table->foreign('clinic_id')
                        ->references('id')->on('clinics')
                        ->onDelete('cascade');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
