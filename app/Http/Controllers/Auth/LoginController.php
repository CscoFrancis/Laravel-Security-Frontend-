<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function showLoginForm(){
        return view('auth.login', [
            'title' => 'User Login Form',
            'formActionUrl' => 'login'
        ]);
    }

    public function login(Request $request){
        $this->validator($request);
        //if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))){
        if(Auth::guard('web')->attempt($request->only('email', 'password'), $request->filled('remember'))){
            return redirect()->intended(route('home'))->with(['status' => 'You have been logged in succesfully']);
        }
        return redirect()->back()->withInput()->with(['error' => 'The credentials do not match!']);
    }

    public function validator(Request $request){
            $rules = [
                'email' => ['required','email','exists:users','max:191','min:10'],
                'password' => ['required', 'string', 'max:255', 'min:4']
            ];
            $message = [
                'email.exists' => 'Check your Credentials'
            ];

            $request->validate($rules, $message);
    }

    public function logout(){
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        return redirect(route('login'));
    }
}
