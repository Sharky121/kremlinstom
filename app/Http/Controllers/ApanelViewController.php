<?php

namespace App\Http\Controllers;



use Auth;
use DB;
use Request;
use Storage;




class ApanelViewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   public function showView($name){
       $templatePath = 'apanel.' . $name;
       if (!view()->exists($templatePath)) {
           abort(404);
       }
       return view($templatePath);
   }
}
