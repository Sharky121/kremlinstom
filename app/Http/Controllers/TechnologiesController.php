<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Worker;


class TechnologiesController extends Controller
{

    public function technologies(\App\Page $page)
    {
        $data = $this->getData();
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['technologies'] = \App\Technology::where('public',1)->orderBy('sort')->get();
        return view('technology',$data);

    }

    public function show(\App\Page $parent,\App\Technology $page)
    {
        $data = $this->getData();
        $page->load('pictures','pictures_top');
        $pic = $page->pictures;
        $page->pictures = $page->pictures_top;
        $page->pictures_top = $pic;
        $data['title_seo'] = $page->title;
        $data['description_seo'] = '';
        $data['keywords_seo'] = '';
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$parent->bread(),[['title'=>$page->title,'link'=>'']]);
        $data['sub_menu']=[];
        return view('page',$data);
    }



}
