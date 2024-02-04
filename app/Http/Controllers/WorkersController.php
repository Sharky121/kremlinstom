<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Worker;


class WorkersController extends Controller
{

    public function workers(\App\Page $page)
    {
        $data = $this->getData();
//        $pageinfo = Page::find(7);
//        if($pageinfo->childs->count()>0||$pageinfo->page_id!=0) {
//            if($pageinfo->page_id!=0){
//                $page = $pageinfo;
//                $pageinfo =$page->parent;
//            }else{
//                $page = $pageinfo->childs->first();
//            }
//            $data['sub_menu'][] = ['link' => $pageinfo->url(), 'title' => $pageinfo->childs->first()->title];
//            for ($i = 1; $i < $pageinfo->childs->count(); $i++) {
//                $data['sub_menu'][] = ['link' => $pageinfo->childs[$i]->url(), 'title' => $pageinfo->childs[$i]->title];
//            }
//        }else{
//            $page = $pageinfo;
//        }

        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['workers'] = Worker::with('pictures','specializations')->where('public',1)->orderBy('sort')->paginate(12);
        $data['clinics'] = \App\Clinic::all();
        $data['specializations'] = \App\Specialization::all();
        $data['no_worker']=true;
        return view('doctors',$data);
    }

    public function show(\App\Page $parent,\App\Worker $page)
    {
        $data = $this->getData();
        $page->load('certificates','pictures','pictures_top','services','reviews.pictures','experiences.pictures');
//        $page->small_content = $page->dop_content;
        $data['title_seo'] = $page->title = $page->name;
        $data['description_seo'] = '';
        $data['keywords_seo'] = '';
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$parent->bread(),[['title'=>$page->title,'link'=>'']]);
        $data['sub_menu']=[];
        $data['no_worker']=true;

        return view('doctor',$data);
    }



}
