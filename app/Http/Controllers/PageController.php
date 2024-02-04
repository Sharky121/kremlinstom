<?php

namespace App\Http\Controllers;

use App\Action;
use App\News;
use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Worker;
use App\Experience;
use App\Review;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function view(\App\Page $page){
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = $page->seo_title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page_title'] = $page->title;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        return view('page',$data);
    }

    public function review()
    {
        $data = $this->getData();
        $pageinfo = Page::find(9);
        $page = $this->genSub($pageinfo, $data);
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['reviews'] = Review::with('pictures')->where('public',1)->where('type','clinic')->orderBy('date','desc')->paginate(12);
        return view('review',$data);
    }

    public function contacts(\App\Page $page)
    {
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['clinics'] = \App\Clinic::all();
        return view('contacts',$data);
    }

    public function about(\App\Page $page)
    {
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        return view('about-single',$data);
    }

    public function reviews(\App\Page $page)
    {
        $data = $this->getData();
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['reviews'] = \App\Review::where('public',1)->where('type','clinic')->orderBy('created_at','desc')->paginate(12);
        //return view('contacts',$data);
        return view('reviews',$data);
    }

    public function news(\App\Page $page)
    {
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['news'] = \App\News::with('pictures')->where('public',1)->orderBy('date','desc')->paginate(12);
        return view('news',$data);

    }


    public function dis(\App\Page $page)
    {
        $data = $this->getData();
        $data['no_discounts'] = true;
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['discounts'] = \App\Action::with('pictures')->where('public',1)->orderBy('sort')->get();
        return view('discount',$data);
    }

    public function photo(\App\Page $page)
    {
        $page->title = 'Фотогалерея';
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['gallery'] = \App\Pictures::where('link','gallery')->where('note_id',1)->orderBy('sort')->paginate(12);
        return view('photo',$data);
    }

    public function video(\App\Page $page)
    {
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['videos'] = \App\Video::where('public',1)->orderBy('sort')->get();
        return view('video',$data);
    }

    public function visit()
    {
        $data = $this->getData();
        $page = new \App\Page();
        $page->title = '';
        $data['page'] = $page;
        $data['title_seo'] = 'Запись';
        $data['description_seo'] = '';
        $data['keywords_seo'] = '';
        $data['workers'] = \App\Worker::with('services')->where('public',1)->orderBy('sort')->get();
        $data['services'] = \App\Service::where('public',1)->get();
        $data['clinics'] = \App\Clinic::orderBy('id')->get();
//        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
//        $data['videos'] = \App\Video::where('public',1)->orderBy('sort')->get();
        return view('visit',$data);
    }

    public function license(\App\Page $page)
    {
        $page->title = 'Лицензии';
        $data = $this->getData();
        $data['page'] = $page;
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['gallery'] = \App\Pictures::where('link','gallery')->where('note_id',2)->orderBy('sort')->get();
        return view('license',$data);
    }

}
