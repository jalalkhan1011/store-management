<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $userInfo = Auth::user();
            if ($userInfo->user_type == 'admin') {
                if ($userInfo->user_type == 'admin' && $request->admin == 'admin') {
                    return redirect()->intended(route('adminDashboard'))
                        ->withSuccess('You have successfully logged in as Admin');
                } else {
                    Auth::logout();
                    return redirect("login")->withSuccess('Login details are not valid');
                }
            } elseif ($userInfo->user_type == 'merchant') {
                if ($userInfo->user_type == 'merchant' && $request->merchant == 'merchant') {
                    return redirect()->intended(route('merchantDashboard'))
                        ->withSuccess('You have successfully logged in as Merchant');
                } else {
                    Auth::logout();
                    return redirect("login")->withSuccess('Login details are not valid');
                }
            }
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
}
