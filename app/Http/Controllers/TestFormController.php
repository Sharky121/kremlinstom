<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Session;
use App\Helpers\TempFile;
use App\Quest;
use Mail;
use App\Worker;
use App\Review;
use App\Question;
use Carbon\Carbon;
use Storage;

class TestFormController extends Controller
{
    public $mailadress = 'sport60@yandex.ru';

    public function index(){
        $data = $this->getData();
        $data['title_seo'] = 'Тест';
        $data['description_seo'] = '';
        $data['keywords_seo'] = '';
        $data['page_title'] = 'Тест';

        return view('test_forms',$data);
    }

    public function sendTest(Request $request){
        $rules = [
            'name' => 'required|max:255',
            'tel' => 'required|max:255',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
        $message = [
            'name.required' => 'Представьтесь',
            'name.max' => 'Имя слишком длинное',
            'tel.required'=>'Укажите телефон',
            'tel.max'=>'Телефон слишком длинный',
            //'g-recaptcha-response.*' => 'Вы точно не робот?'
        ];
//        $this->validate($request,
//            [
//                'name' => 'required|max:255',
//                'tel' => 'required|max:255',
//                'g-recaptcha-response' => 'required|recaptcha',
//            ], [
//                'name.required' => 'Представьтесь',
//                'name.max' => 'Имя слишком длинное',
//                'tel.required'=>'Укажите телефон',
//                'tel.max'=>'Телефон слишком длинный',
//                'g-recaptcha-response.*' => 'Введите символы с картинки'
//            ]);
        $v = Validator::make($request->all(),$rules, $message );


        if($v->fails()){
            return redirect('/test_form')->withErrors($v)->withInput();

        }

        $res=Mail::send('mails.zapis', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to($this->mailadress,'Сайт')->subject('Запись на приём с сайта');

        });
//        if($res) {
//            return response()->json([
//                'message' => 'Ваша заявка отправлена',
//
//            ]);
//        }else{
//            abort(500,'ошибка отправки');
//        }
        Session::flash('send_ok', 'Ваш отзыв принят.');
        return redirect('/test_form');
    }

    public function sendTest2(Request $request){

        $this->validate($request,
            [
                'name' => 'required|max:255',
                'tel' => 'required|max:255',
                'g-recaptcha-response' => 'required|recaptcha',
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'tel.required'=>'Укажите телефон',
                'tel.max'=>'Телефон слишком длинный',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);


        Mail::send('mails.zapis', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to($this->mailadress,'Сайт')->subject('Запись на приём с сайтаrrrrrr');

        });

        return response()->json([
            'message' => 'Ваша заявка отправлена',

        ]);


    }


}
