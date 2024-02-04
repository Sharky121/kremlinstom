<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use Jenssegers\Agent\Agent;
use App\Page;
use App\Setting;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Service;
use App\Worker;
use Illuminate\Routing\Route;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    public function getData(){
        if(!isset($this->data)){
            $data = [];
            $router = app('router');
            $data['service_url'] = isset($router->service_url)?$router->service_url:'';
            $data['worker_url'] = isset($router->worker_url)?$router->worker_url:'';
            $data['review_url'] = isset($router->review_url)?$router->review_url:'';
            $data['technology_url'] = isset($router->technology_url)?$router->technology_url:'';
            $data['news_url'] = isset($router->news_url)?$router->news_url:'';
            $data['video_url'] = isset($router->video_url)?$router->video_url:'';
            $data['photo_url'] = isset($router->photo_url)?$router->photo_url:'';
            $data['blog_url'] = isset($router->blog_url)?$router->blog_url:'';
            $data['dis_url'] = isset($router->dis_url)?$router->dis_url:'';
            $data['all_workers'] = Worker::with('pictures')->where('public',1)->select('id','name','url','link','position')->orderby('sort')->get();
            $data['all_services'] = Service::with('ico')->where('public',1)->select('id','title','url','link')->orderby('sort')->get();
            $data['all_technologies'] = \App\Technology::with('pictures')->where('public',1)->select('id','title','url','link','video_link')->orderby('sort')->get();
            $data['blog_menu'] = \App\Blog::with(['gallery'])->where('blog_id',0)->select('id','title','url','link');
            if(!Auth::check()){
                $data['blog_menu'] = $data['blog_menu']->where('public',1);
            }
            $data['blog_menu'] = $data['blog_menu']->orderby('sort')->get();
            $data['show_blog'] = $data['blog_menu']->count()>0;

            $data['discounts_menu'] = \App\Action::where('public',1)->orderBy('sort')->get();
            $data['show_discounts'] = $data['discounts_menu']->count()>0;

            $data['news_left'] = \App\News::with('pictures')->where('public',1)->orderBy('date','desc')->limit(2)->get();
            $data['video_left'] = \App\Video::where('public',1)->orderBy('sort')->limit(2)->get();
            $data['pages'] = $router->allPages->keyBy('id');
            $data['menu'] = $router->allPages->where('id', 1)->merge($router->allPages->where('public',1)->where('top_menu',1));
            $data['services'] = Service::where('public',1)->select('id','url','title')->get()->keyBy('id');

            $data['settings'] = Setting::all();
            $data['agent'] = new Agent();
            $this->data = $data;
        }
        return $this->data;
    }

    public function getSetting($code){
        $data = $this->getData();
        return $data['settings']->where('code',$code)->first()->value;
    }


}
