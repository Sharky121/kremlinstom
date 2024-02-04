<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use App\DelayedChange;
use App\Flat;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //удаляет не отвеченные звонки
//        $schedule->call(function () {
//            \Log::info('dfsfg '.\Carbon\Carbon::now());
//            DB::table('calls')->where('status',0)->whereRaw('`created_at`<=DATE_SUB(NOW(), INTERVAL 3 MINUTE)')->delete();
//        })->cron('* * * * * *');
//
//        $schedule->call(function () {
//           //DB::table('calls')->where('status',0)->whereRaw('`created_at`<=DATE_SUB(NOW(), INTERVAL 3 MINUTE)')->delete();
//            $chages = DelayedChange::whereRaw('`date` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MINUTE) AND DATE_ADD(NOW(), INTERVAL 1 MINUTE)')->where('status',0)->get();
//            $chages->each(function($ch,$key){
//                \Log::info('change '.\Carbon\Carbon::now().' id_change='.$ch->id);
//                $ch->change->each(function($change,$key){
//                    //\Log::info('change '.\Carbon\Carbon::now().' '.$change->collapse()->except(['id'])->toJson());
//                    Flat::where('id',$key)->update($change->collapse()->except(['id'])->toArray());
//                });
//                $ch->status=1;
//                $ch->save();
//            });
//        })->cron('* * * * * *');
    }
}
