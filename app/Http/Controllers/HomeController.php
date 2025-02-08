<?php
namespace App\Http\Controllers;
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
            return redirect(route('adminDashboard'));
        }elseif($userInfo->user_type=='merchant'){
            return redirect(route('merchantDashboard'));
        } 
    }

    public function adminDashboard(){ 
        return view('dashboard.adminDashboard');
    }

    public function merchantDashboard(){ 
        return view('dashboard.merchantDashboard');
    }
}
