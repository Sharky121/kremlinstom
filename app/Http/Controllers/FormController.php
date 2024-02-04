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

class FormController extends Controller
{
    //public $mailadress = 'loginov@cherryline.ru';
    public $mailadress = 'info@kremlinstom.ru';
    public function __construct(TempFile $tempFile)
    {
        $this->temp_file = $tempFile;
    }

//  Блок  Записаться на приём на главной
    public function zapis(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'tel' => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'tel.required'=>'Укажите телефон',
                'tel.max'=>'Телефон слишком длинный',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);


        $res=Mail::send('mails.zapis', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Запись на приём с сайта');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Запись на приём с сайта');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Запись на приём с сайта');
        });
        if($res) {
            return response()->json([
                'message' => 'Ваша заявка отправлена',

            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }

    //  Блок рекоммендации
    public function recommendation(Request $request){

        $this->validate($request,
            [
                'name' => 'required|max:255',
                'email'  => 'required|email',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'email.required'  => 'Укажите E-mail',
                'email.email'  => 'Неверный формат E-mail',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);
        $res=Mail::send('mails.recommendation', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Получить рекомендацию');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Получить рекомендацию');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Получить рекомендацию');
        });
        if($res) {
            Mail::send('mails.recommendation_file', $request->toArray(), function ($m) use($request) {
                $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
                $m->to($request->input('email'), $request->name)->subject('Памятка от Кремлевской стоматологии');
                $files = Storage::disk('upload')->files('send_files');
                foreach($files as $file){
                    if(preg_match("/Памятка по уходу за полостью рта пациенту Кремлевской стоматологии(\..*?)$/",$file,$match)) {
                        $file_cont = Storage::disk('upload')->get($file);
                        $m->attachData($file_cont,"Памятка по уходу за полостью рта пациенту Кремлевской стоматологии".$match[1]);
                    }
                }

            });
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }

    public function main(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'tel'  => 'required|max:255',
//              'email'  => 'required|max:255',
//              'service' => 'required|max:255',
//              'doctors'  => 'required|max:255',
                'date'  => 'required|max:255',
                //'time'  => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                //'time.required' => 'Укажите время',
                //'time.max' => 'Время слишком длинное',
                'tel.required'  => 'Укажите телелфон',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);

        $res=Mail::send('mails.main', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Запись на приём');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Запись на приём');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Запись на приём');
        });
        if($res) {
            Question::create([
                'email'=>$request->input('email'),
                'author'=>$request->input('name'),
                'date'=>new Carbon(),
            ]);
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }

    // ВОПРОС - ОТВЕТ
    public function faq(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'email'  => 'required|max:255',
                'text'  => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'text.required' => 'Представьтесь',
                'text.max' => 'Имя слишком длинное',
                'email.required' => 'Укажите время',
                'email.max' => 'Время слишком длинное',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);
        $res=Mail::send('mails.review', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Вопрос с сайта');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Вопрос с сайта');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Вопрос с сайта');
        });
        if($res) {
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }

    // ОТЗЫВ
    public function review(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'email'  => 'required|max:255',
                'text'  => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'text.required' => 'Представьтесь',
                'text.max' => 'Имя слишком длинное',
                'email.required' => 'Укажите время',
                'email.max' => 'Время слишком длинное',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);
        $res=Mail::send('mails.review', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Отзыв с сайта');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Отзыв с сайта');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Отзыв с сайта');
        });
        if($res) {
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }



    // Записаться на лечение зубов
    public function reg_treatment(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'tel'  => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'tel.required' => 'Ваш телефон',
                'tel.max' => 'Телефон слишком длинный',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);
        $res=Mail::send('mails.reg-treatment', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Запись на лечение зубов');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Запись на лечение зубов');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Запись на лечение зубов');
        });
        if($res) {
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }



    // Записаться на лечение зубов
    public function pain(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'tel'  => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'tel.required' => 'Ваш телефон',
                'tel.max' => 'Телефон слишком длинный',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);
        $res=Mail::send('mails.pain', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('У меня острая боль или воспаление');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('У меня острая боль или воспаление');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('У меня острая боль или воспаление');
        });

        if($res) {
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }


    //Мы вам перезвоним!
    public function callback(Request $request){
        $this->validate($request,
            [
                'name' => 'required|max:255',
                'tel'  => 'required|max:255',
                'g-recaptcha-response' => 'required|cherry-recaptcha:' . $request->input('g-recaptcha-action') . ',' . $request->ip() . ',' . $request->getHttpHost(),
            ], [
                'name.required' => 'Представьтесь',
                'name.max' => 'Имя слишком длинное',
                'tel.required' => 'Ваш телефон',
                'tel.max' => 'Телефон слишком длинный',
                'g-recaptcha-response.*' => 'Вы точно не робот?'
            ]);
        $res=Mail::send('mails.callback', $request->toArray(), function ($m) {
            $m->from('noreply@kremlinstom.ru', 'Кремлевская стоматология');
            $m->to('at@cherryline.ru','Сайт')->subject('Мы вам перезвоним!');
            $m->to('info@kremlinstom.ru','info@kremlinstom.ru')->subject('Мы вам перезвоним!');
            $m->to('polovinkin@kremlinstom.ru','polovinkin@kremlinstom.ru')->subject('Мы вам перезвоним!');
        });
        if($res) {
            return response()->json([
                'message' => 'Ваша заявка отправлена',
            ]);
        }else{
            abort(500,'ошибка отправки');
        }
    }


}
