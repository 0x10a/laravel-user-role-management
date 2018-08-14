<?php

namespace URM\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use URM\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can(['view_users'])){
            $users = User::latest()->get();

            $NumberOfUsers = count($users);

            return view('welcome', compact('NumberOfUsers'));
        }
        else{
            return view('welcome');
        }
    }
}
