<?php

namespace App\Providers;

use app\Helpers\TempFile;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Validator;
use Gate;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Service;
use App\Worker;
use App\Page;
use ReCaptcha\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // свой валидатор для проверки доступа к объкту
        Validator::extend('object', function($attribute, $value, $parameters, $validator) {

            switch($parameters[0]){
             case 'read':
                 return Gate::allows('readObject',$value);
                break;
            case 'write':
                return Gate::allows('writeObject',$value);
                break;
            case 'delete':
                return Gate::allows('deleteObject',$value);
                break;
            default :
                return false;
                break;
            }
        });

        // свой валидатор для recaptcha v3
        Validator::extendImplicit('cherryRecaptcha', function($attribute, $value, $parameters, $validator) {
            $recaptcha = new ReCaptcha('6Lc1FtwUAAAAAGfF9kdPyaL7i1MFmCsCbxxgUHMq');
            $resp = $recaptcha->setExpectedHostname($parameters[2])
                ->setExpectedAction($parameters[0])
                ->setScoreThreshold(0.5)
                ->verify($value, $parameters[1]);
            return $resp->isSuccess();
        }, 'Please ensure that you are a human!');

        // свои полиморфные типы
        Relation::morphMap([
            'service' => Service::class,
            'doctor' => Worker::class,
            'clinic' => Page::class
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\TempFile', function($app){
            return new TempFile($app->request);
        });
    }
}
