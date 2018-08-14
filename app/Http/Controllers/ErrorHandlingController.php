<?php

namespace URM\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlingController extends Controller
{
    public function _401()
    {
        return view('errors.front_401');
    }

    public function _404()
    {
        return view('errors.front_404');
    }

    public function _500()
    {
        return view('errors.front_500');
    }
}
