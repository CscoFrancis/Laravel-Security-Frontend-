<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegisterForm(){
        return view('auth.register', [
            'title' => 'User Register Form',
            'formUrl' => 'register'
            ]);
    }

    public function register(Request $request){
       $validator = $this->validator($request->only('name','email', 'password'));
       if($validator->fails()){
        //dd($validator);
        return redirect()->back()->withInput()->withErrors($validator);
    }
    else{
        $this->create($request->only('name','email', 'password'));
        return redirect()->route('home');
    }
}
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        $rules = [
            'name' => 'required|min:4|max:100',
            'email' =>'required|email|string|unique:users|min:10',
            'password' => 'required|string|min:4|max:255|confirmed'
        ];
        return Validator::make($data, $rules);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   protected function create(array $data){
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
   }
}
