<?php

namespace App\Http\Controllers;

class NotFoundController extends Controller
{
    public function index()
    {
        $data = $this->getData();
        return response()->view('errors.404', $data);
    }
}
