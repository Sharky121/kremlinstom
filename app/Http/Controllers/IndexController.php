<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Service;
use App\Action;
use App\Worker;

class IndexController extends Controller
{
    public function index(){
        $data = $this->getData();
        $pageinfo = Page::find(1);
        $data['title_seo'] = !empty($pageinfo->seo_title)?$pageinfo->seo_title:$pageinfo->title;
        $data['description_seo'] = $pageinfo->seo_description;
        $data['keywords_seo'] = $pageinfo->seo_keywords;
        $data['page'] = $pageinfo;
        $data['gallery'] = \App\Pictures::where('link','gallery')->where('note_id',1)->orderBy('sort')->limit(4)->get();
//        $data['actions'] = Action::with('pictures')->where('public',1)->orderBy('sort')->limit(3)->get();
        $data['news'] = \App\News::with('pictures')->where('public',1)->orderBy('date','desc')->limit(6)->get();
        $data['reviews'] = \App\Review::where('public',1)->where('type','clinic')->orderBy('created_at','desc')->limit(6)->get();
        $data['workers'] = Worker::with('pictures')->where('public',1)->orderBy('sort')->get();
        $data['banners'] = \App\Baner::with('pictures')->where('public',1)->orderBy('sort')->get();

        return view('welcome',$data);
    }




}
