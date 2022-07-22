<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected function authenticated() {
      if (Auth::user()->user_status =='1' && Auth::user()->role =='0'){
          return redirect('/');
      }
      else if (Auth::user()->user_status =='1' && Auth::user()->role =='1'){
        return redirect('/dashboard');
      }
      else if (Auth::user()->user_status =='1' && Auth::user()->role =='2'){
        return redirect('/campaign_university');
      }
      else{
         Auth::logout();
         return redirect('/login')->with('error','Your account has not beed activated Yet.Contact admin@gmail.com');
      }
  }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
