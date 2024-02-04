<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('actions')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('actions')->insert(
            array(
                array('id' => '1','created_at' => NULL,'updated_at' => NULL,'sort' => '4','title' => 'Бессрочная акция','content' => '<p>Профессиональная чистка всех зубов ультразвуком с покрытием реминерализующим препаратом ко дню рождения 1500 руб.</p>

<p>Действует за неделю до и неделю после знаменательного события.</p>

<p><strong>Не забудьте взять паспорт!</strong></p>
','period' => '','public' => '1')
            )
        );
    }
}
