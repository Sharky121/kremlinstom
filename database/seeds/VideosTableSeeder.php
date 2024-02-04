<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->truncate();

        DB::table('videos')->insert(
            array(
                array('id' => '1','sort' => '2','title' => 'Когда нужно ставить коронку, а когда пломбу','link' => 'https://www.youtube.com/embed/svpTCelul-Q','public' => '1'),
                array('id' => '3','sort' => '1','title' => 'Как за рубежом ставят высококачественные пломбы','link' => 'https://www.youtube.com/embed/GapaA0WHHU8?list=PLvt_rL0eXL4OatlLphhC7Dpomk_kYF1yr','public' => '1')
            )
        );
    }
}
