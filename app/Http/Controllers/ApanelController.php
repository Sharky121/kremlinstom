<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ApanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //Session::put('KCFINDER', array('disabled'=>false));

    }

    /**
     * Отображение главной старницы админки
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('apanel/main');
    }

    public function home()
    {
        return view('apanel/home');
    }

    public function showView(){
        return view('apanel/panel');
    }
}
