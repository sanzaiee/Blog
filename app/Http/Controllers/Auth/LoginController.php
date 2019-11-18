<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
    }

    public function redirectTo()
    {
    $userrole=Auth::user()->user_type;

    if($userrole==0){

        $this->redirectTo = '/superadmin';
        return $this->redirectTo;
    }
    elseif($userrole==1){
    $this->redirectTo = '/admin';
    return $this->redirectTo;
    }
    elseif($userrole==2){
    $this->redirectTo = '/';
        return $this->redirectTo;
    }else{
    dd('not allowed');
    }
    }



}
