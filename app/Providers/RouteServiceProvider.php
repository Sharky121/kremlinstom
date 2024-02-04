<?php

namespace App\Providers;

use App\Http\Requests\Request;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {

        //
        $router->get( '/_debugbar/assets/stylesheets', '\Barryvdh\Debugbar\Controllers\AssetController@css' );
        $router->get( '/_debugbar/assets/javascript', '\Barryvdh\Debugbar\Controllers\AssetController@js' );
        $router->get( '/_debugbar/open', '\Barryvdh\Debugbar\Controllers\OpenController@handler' );


        $router->bind('page', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_question', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_service', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_technologies', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('link', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_contacts', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_reviews', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_news', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_video', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_photo', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_license', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('worker', function ($value) {
            return \App\Worker::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('technology', function ($value) {
            return \App\Technology::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('service', function ($value) {
            return \App\Service::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_about', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_dis', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('blog', function ($value) {
            return \App\Blog::where('url', $value)->firstOrFail();
            //return \App\Blog::where('url', $value)->where('public',1)->firstOrFail();
        });

        $router->bind('page_blog', function ($value) {
            return \App\Page::where('url', $value)->where('public',1)->firstOrFail();
        });

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {

            // добавление динамичеких роутов зависимых от типов страниц
            if(true) {
                $allPages = \App\Page::select(['id', 'title', 'link', 'url', 'page_id', 'public', 'type_id','top_menu'])->with('type')->orderBy('sort')->get();
                $router->allPages = $allPages;
                $allPages->map(function ($item, $key) use (&$router) {

                    if($item->type->layout =='services'){
                        $router->service_url = $item->url();
                        $router->get('{page_service}',  'ServicesController@service')
                            ->where('page_service', $item->url);
                        $router->get('{page_service}/{service}', 'ServicesController@show')
                            ->where('page_service', $item->url);
                    }

                    if($item->type->layout =='questions'){
                        $router->question_url = $item->url();
                        $router->get('{page_question}',  'QuestionController@listAll')
                            ->where('page_question', $item->url);
                    }

                    if($item->type->layout =='contacts'){
                        $router->contacts_url = $item->url();
                        $router->get('{page_contacts}',  'PageController@contacts')
                            ->where('page_contacts', $item->url);
                    }

                    if($item->type->layout =='technologies'){
                        $router->technology_url = $item->url();
                        $router->get('{page_technologies}',  'TechnologiesController@technologies')
                            ->where('page_technologies', $item->url);
                        $router->get('{page_technologies}/{technology}', 'TechnologiesController@show')
                            ->where('page_technologies', $item->url);
                    }

                    if($item->type->layout =='prices'){
                        $router->prices_url = $item->url();
                        $router->get('{page_prices}',  'PriceController@download_price_client')
                            ->where('page_prices', $item->url);
                    }

                    if($item->type->layout =='reviews'){
                        $router->review_url = $item->url();
                        $router->get('{page_reviews}',  'PageController@reviews')
                            ->where('page_reviews', $item->url);
                    }

                    if($item->type->layout =='about_single'){
                        $router->review_url = $item->url();
                        $router->get('{page_about}',  'PageController@about')
                            ->where('page_about', $item->url);
                    }

                    if($item->type->layout =='discount'){
                        $router->dis_url = $item->url();
                        $router->get('{page_dis}',  'PageController@dis')
                            ->where('page_dis', $item->url);
                    }

                    if($item->type->layout =='news'){
                        $router->news_url = $item->url();
                        $router->get('{page_news}',  'PageController@news')
                            ->where('page_news', $item->url);
                    }

                    if($item->type->layout =='video'){
                        $router->video_url = $item->url();
                        $router->get('{page_video}',  'PageController@video')
                            ->where('page_video', $item->url);
                    }

                    if($item->type->layout =='photos'){
                        $router->photo_url = $item->url();
                        $router->get('{page_photo}',  'PageController@photo')
                            ->where('page_photo', $item->url);
                    }

                    if($item->type->layout =='license'){
                        $router->photo_url = $item->url();
                        $router->get('{page_license}',  'PageController@license')
                            ->where('page_license', $item->url);
                    }

                    if ($item->type->layout == 'workers') {
                        $router->worker_url = $item->url();
                        $router->get('{page}',  'WorkersController@workers')
                            ->where('page', $item->url);
                        $router->get('{page}/{worker}', 'WorkersController@show')
                            ->where('page', $item->url);
                    }

                    if ($item->type->layout == 'blog') {
                        $router->blog_url = $item->url();
                        $router->get('{page_blog}',  'BlogController@index')
                            ->where('page_blog', $item->url);
                        $router->get('{page_blog}/{blog}', 'BlogController@show')
                            ->where('page_blog', $item->url)->where('blog', '[a-zA-Z0-9/_-]+');
                    }

                });
            }



            require app_path('Http/routes.php');
        });
    }
}
