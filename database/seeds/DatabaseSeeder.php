<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
        $this->call('MenuTableSeeder');
        $this->call('AccessTableSeeder');
        $this->call('PagesTableSeeder');
        $this->call('SettingTableSeeder');
        $this->call('PageTypesTableSeeder');
        $this->call('ClinicsTableSeeder');
        $this->call('SpecializationTableSeeder');
        $this->call('WorkerTableSeeder');
        $this->call('PictureTableSeeder');
        $this->call('ServicesTableSeeder');
        $this->call('PricesTableSeeder');
        $this->call('ServiceWorkerTableSeeder');
        $this->call('ActionsTableSeeder');
        $this->call('ActionServiceTableSeeder');
        $this->call('NewsTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('BanerTableSeeder');
        $this->call('ReviewsTableSeeder');
        $this->call('VideosTableSeeder');
        $this->call('ContentBlockTableSeeder');
        $this->call('GalleryTableSeeder');
        $this->call('ExperiencesTableSeeder');
        $this->call('DiseasesTableSeeder');
        $this->call('DiseaseServiceTableSeeder');
        $this->call('TechnologiesTableSeeder');
        $this->call('ServiceTechnologySeeder');

    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert(array(
            'name'=>'admin',
            'email' => 'admin@mail.ru',
            'password' => bcrypt('123456')
        ));
    }

}

class SettingTableSeeder extends Seeder{
    public function run()
    {
        DB::table('settings')->truncate();

        App\Setting::insert(array(
            [
                'title'=>'TITLE TAG главной страницы',
                'code'=>'index_title',
                'value'=>''
            ],
            [
                'title'=>'META KEYWORDS главной страницы',
                'code'=>'index_keywords',
                'value'=>''
            ],
            [
                'title'=>'META DESCRIPTION главной страницы',
                'code'=>'index_description',
                'value'=>''
            ],
        ));
    }
}


