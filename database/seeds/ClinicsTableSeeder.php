<?php

use Illuminate\Database\Seeder;

class ClinicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('clinics')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('clinics')->insert(
            array(
                array('id' => '1','title' => 'пл. Соборная, д.9','address' => '390000 г. Рязань, пл.Соборная, д.9','grafik' => 'с 9:00 до 21:00, без выходных','phone' => '<span> 8 (800) 77-525-77, (4912) 50-50-40, (4912) 28-40-50</span>','coords' => '54.634194, 39.747918')
            )
        );
    }
}
