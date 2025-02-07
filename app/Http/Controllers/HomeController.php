<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userInfo = Auth::user();
        if($userInfo->user_type =='admin'){
            dd('admin');
        }elseif($userInfo->user_type=='merchant'){
            dd('merchant');
        }
        // return view('home');
    }
}
