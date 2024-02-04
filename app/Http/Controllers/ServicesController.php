<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Service;


class ServicesController extends Controller
{

    public function service(\App\Page $page)
    {
        $data = $this->getData();
        /*$pageinfo = Page::find(10);
        if($pageinfo->childs->count()>0||$pageinfo->page_id!=0) {
            if($pageinfo->page_id!=0){
                $page = $pageinfo;
                $pageinfo =$page->parent;
            }else{
                $page = $pageinfo->childs->first();
            }
            $data['sub_menu'][] = ['link' => $pageinfo->url(), 'title' => $pageinfo->childs->first()->title];
            for ($i = 1; $i < $pageinfo->childs->count(); $i++) {
                $data['sub_menu'][] = ['link' => $pageinfo->childs[$i]->url(), 'title' => $pageinfo->childs[$i]->title];
            }
        }else{
            $page = $pageinfo;
        }*/
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['services'] = Service::with(['pictures','actions'=>function($query){
                                                $query->select('title','id');
                                            }])
                            ->where('public',1)->orderBy('sort')->get();
        $data['no_service'] = true;
        $data['diseases'] = \App\Disease::with('services')->get();
        return view('service',$data);
    }
    public function price()
    {
        $data = $this->getData();
        $pageinfo = Page::find(14);
        if($pageinfo->childs->count()>0||$pageinfo->page_id!=0) {
            if($pageinfo->page_id!=0){
                $page = $pageinfo;
                $pageinfo =$page->parent;
            }else{
                $page = $pageinfo->childs->first();
            }
            $data['sub_menu'][] = ['link' => $pageinfo->url(), 'title' => $pageinfo->childs->first()->title];
            for ($i = 1; $i < $pageinfo->childs->count(); $i++) {
                $data['sub_menu'][] = ['link' => $pageinfo->childs[$i]->url(), 'title' => $pageinfo->childs[$i]->title];
            }
        }else{
            $page = $pageinfo;
        }
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$pageinfo->bread(),[['title'=>$page->title,'link'=>'']]);
        $data['services'] = Service::with(['pictures','dop_services','prices','actions'=>function($query){
            $query->select('title','id');
        }])->where('public',1)->get();
        return view('price',$data);
    }

    public function show(\App\Page $parent,\App\Service $page)
    {
        $data = $this->getData();
        $page->load('workers','actions','prices','content_blocks.pictures','pictures','reviews.pictures','technologies');
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']], $parent->bread(), [['title'=>$page->title,'link'=>'']]);
        $data['no_service'] = true;
        $data['diseases'] = \App\Disease::with('services')->get();
        $data['parent_page'] = $parent;
        return view('service-item',$data);
    }



}
