<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $data = $this->getData();
        $news = News::where('public',1)->orderby('date','desc')->paginate(12);
        $data['news'] = $news;
        $data['title_seo'] = 'Новости и акции';
        $data['description_seo'] = '';
        $data['keywords_seo'] = '';
        $data['page_title'] = 'Новости и акции';

        return view('news',$data);
    }
}
