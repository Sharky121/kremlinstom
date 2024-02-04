<?php
    Route::get('/technology',function(){
        return view('/technology');
    });

    Route::get('/service-item',function(){
        return view('/service-item');
    });

    Route::get('/service',function(){
        return view('/service');
    });

    Route::get('/faq',function(){
        return view('/faq');
    });

    Route::get('/doctors',function() {
        return view('/doctors');
    });

    Route::get('/our-doctors',function(){
        return view('/our-doctors');

    });

    Route::get('/test_form','TestFormController@index');
    Route::post('/send_test','TestFormController@sendTest');
    Route::post('/send_test2','TestFormController@sendTest2');

//    Route::get('/download/{id}', '\App\Http\Controllers\ObjectController@download');

    Route::get('/', 'IndexController@index');

    Route::get('/captcha/default',function(){
         return Captcha::create();
    });

//    Route::get('/news/news', 'PageController@news');
//    Route::get('/news', 'PageController@actions');
    Route::get('/question', 'PageController@question');

    Route::get('/service', 'ServicesController@service');
    Route::get('/service/stomatologija-cenjy', 'ServicesController@price');
    Route::get('/service/download-price', 'PriceController@download_price_client');
    Route::get('/service/{link}', 'ServicesController@show')->where('link', '[a-zA-Z0-9/_-]+');

//    Route::get('/doctors', 'WorkersController@workers');
//    Route::get('/doctors/{link}', 'WorkersController@show')->where('link', '[a-zA-Z0-9/_-]+');


//    Route::get('/news/news', 'PageController@news');
//    Route::get('/news', 'PageController@actions');
//    Route::get('/question', 'PageController@question');
//
//    Route::get('/service', 'ServicesController@service');
//    Route::get('/service/stomatologija-cenjy', 'ServicesController@price');
//    Route::get('/service/download-price', 'PriceController@download_price_client');
//    Route::get('/service/{link}', 'ServicesController@show')->where('link', '[a-zA-Z0-9/_-]+');
//
//    Route::get('/doctors', 'WorkersController@workers');
//    Route::get('/doctors/{link}', 'WorkersController@show')->where('link', '[a-zA-Z0-9/_-]+');
//
//
//    Route::get('/about/experience', 'ExperienceController@experience');
//    Route::get('/about/experience/{link}', 'ExperienceController@show')->where('link', '[a-zA-Z0-9/_-]+');
//    Route::get('/about/reviews', 'PageController@review');
//
//    Route::get('/contacts', 'PageController@contacts');
//    Route::post('/test_mail', 'FormController@sendMail');
        Route::post('/send_zapis', 'FormController@zapis');
        Route::post('/send_recommendation', 'FormController@recommendation');
        Route::post('/send_callback', 'FormController@callback');
        Route::post('/send_gift', 'FormController@firstgift');
        Route::post('/send_pain', 'FormController@pain');
        Route::post('/send_reg-treatment', 'FormController@reg_treatment');
        Route::post('/send_appointment', 'FormController@main');
        Route::post('/send_faq', 'FormController@faq');
        Route::post('/send-director', 'FormController@director');
        Route::post('/send_review', 'FormController@review');
        //    Route::post('/send_quest', 'FormController@quest');

        Route::get('/visit', 'PageController@visit');


        Route::get('login', 'Auth\AuthController@showLoginForm');// админка
        Route::post('login', 'Auth\AuthController@login');// админка
        Route::get('logout', 'Auth\AuthController@logout');// админка
        Route::get('/apanel', 'ApanelController@index',['middleware'=>['auth']]);// админка
        Route::post('/apanel/home', 'ApanelController@home',['middleware'=>['auth']]);// админка
        Route::get('/apanel/price_download', 'PriceController@download_price')->middleware(['auth']);
        Route::controller('/apanel/model', 'ApanelModelController'); // админка возвращает модели для ангуляра
        Route::get('/apanel/views/{name}.html', 'ApanelViewController@showView',['middleware'=>['auth']]);// админка шаблоны



        Route::get('/{link}', 'PageController@view')->where('link', '[a-zA-Z0-9/_-]+');


