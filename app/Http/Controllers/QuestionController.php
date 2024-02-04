<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Question;


class QuestionController extends Controller
{

    public function listAll(\App\Page $page)
    {
        $data = $this->getData();
        $data['title_seo'] = !empty($page->seo_title)?$page->seo_title:$page->title;
        $data['description_seo'] = $page->seo_description;
        $data['keywords_seo'] = $page->seo_keywords;
        $data['page'] = $page;
        $data['bread'] = array_merge([['title'=>'Главная','link'=>'/']],$page->bread());
        $allQuestions = Question::where('public',1)->orderBy('date','desc')->get();
        $data['faq_quests'] = $allQuestions->where('faq',1);
        $data['quests'] = $allQuestions->where('faq',0);
        return view('faq',$data);
    }





}
