<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';
    protected $redirectPath = '/';
    
    public function username()
    {
        return 'name';
    }
    
    public function showLogoutForm() 
    {
        return view('auth.logout');
    }


    public function showLoginForm() 
    {
        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'showLogoutForm']]); // close login if authenticated
        $this->middleware('noguest', ['except' => ['login', 'showLoginForm']]); // close login if NOT authenticated
        // if(!Auth::check()) {
        //     $this->middleware('auth', ['except' => ['showLoginForm', 'login']]); // close login if NOT authenticated and return to previous page before login
        // }
    }

}