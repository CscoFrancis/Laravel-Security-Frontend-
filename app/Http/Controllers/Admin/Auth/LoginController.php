<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function __construct(){
        
    }

    public function showLoginForm(){
        return view('auth.login', [
            'title' => 'Admin Login Form',
            'formActionUrl' => 'admin.login'
        ]);
    }

    public function login(Request $request){
            $this->validator($request);
            if(Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))){
                return redirect()->intended(route('admin.products'))->with(['status' => 'Successfully Logged in as Admin']);
            }
        return redirect()->back()->withInput()->with(['error' => 'Check your credentials!']);
    }

    public function validator(Request $request){
            $rules = [
                'email' => 'required|email|exists:admins|max:100|min:10',
                'password' => 'required|string|min:4'
            ];
            $message = [
                'email.exists' => 'Credentials do not Match!'
            ];
            $request->validate($rules, $message);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
