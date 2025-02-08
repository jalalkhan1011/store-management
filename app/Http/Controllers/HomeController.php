<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
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
        if ($userInfo->user_type == 'admin') {
            return redirect(route('adminDashboard'));
        } elseif ($userInfo->user_type == 'merchant') {
            return redirect(route('merchantDashboard'));
        }
    }

    public function adminDashboard()
    {
        $merchants = User::where('user_type', 'merchant')->get();
        return view('dashboard.adminDashboard', compact('merchants'));
    }

    public function merchantDashboard()
    {
        $stores = Store::all();

        return view('dashboard.merchantDashboard',compact('stores'));
    }
}
