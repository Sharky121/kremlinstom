<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\AccessPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // проверка доступа к модулям админки
        $gate->define('readModule', function ($user,$menu_id) {
            return !$user->access->where('menu_id',$menu_id)->where('read',1)->isEmpty();
        });

        $gate->define('writeModule', function ($user,$menu_id) {
            return !$user->access->where('menu_id',$menu_id)->where('write',1)->isEmpty();
        });

        $gate->define('deleteModule', function ($user,$menu_id) {
            return !$user->access->where('menu_id',$menu_id)->where('delete',1)->isEmpty();
        });

        // проверка разрешений
//        $gate->define('readPermiss', function ($user,$permission_id) {
//            return !$user->permissions()->where('permission_id',$permission_id)->where('read',1)->get()->isEmpty();
//        });
//
//        $gate->define('writePermiss', function ($user,$permission_id) {
//            return !$user->permissions()->where('permission_id',$permission_id)->where('write',1)->get()->isEmpty();
//        });
//
//        $gate->define('deletePermiss', function ($user,$permission_id) {
//            return !$user->permissions()->where('permission_id',$permission_id)->where('delete',1)->get()->isEmpty();
//        });


    }
}
