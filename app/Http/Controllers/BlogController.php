<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Blog;
use Auth;


class BlogController extends Controller
{

    public function index(\App\Page $page)
    {
        $data = $this->getData();
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $data['no_blog'] = true;
        $data['blog_childs'] = Blog::with('gallery');
        if(!Auth::check()){
            $data['blog_childs'] = $data['blog_childs']->where('public',1);
        }
        $data['blog_childs'] = $data['blog_childs']->orderBy('sort')->get();
        return view('blog',$data);
    }

    public function show(\App\Page $parent,\App\Blog $page)
    {
        $data = $this->getData();
        if(!Auth::check() && ($page->public<1 || !$data['show_blog']) ){
            abort(404);
        }
        $page->load('gallery');
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']], $parent->bread(),$page->bread($parent->url()));
        $data['no_blog'] = true;
        if($page->childs->count()>0){
            $page->load(['childs'=>function($query){
                if(!Auth::check()){
                    $query->where('public',1);
                }
            },'childs.gallery']);
            $data['blog_childs'] = $page->childs;
        }
        return view('blog',$data);
    }



}
