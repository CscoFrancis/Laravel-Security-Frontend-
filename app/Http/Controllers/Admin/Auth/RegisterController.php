<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;
use App\Admin;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegisterUsers;

class RegisterController extends Controller{

    public function __construct(){
        $this->middleware('guest:admin');
    }

    public function showRegisterForm(){
        return view('auth.register', ['title' => 'Register Admin', 'formUrl' => 'admin.register']);
    }

    public function register(Request $request){
        $validator = $this->validator($request->only('name','email', 'password'));
        if($validator->fails()){
            //dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else{
            $this->create($request->only('name', 'email', 'password'));
            return redirect()->route('admin.products');
        }
    }

    protected function validator(array $data){
        $rules = [
            'name' => 'required|min:4|max:100',
            'email' =>'required|email|string|unique:admins|min:10',
            'password' => 'required|string|min:4|max:255|confirmed'
        ];
        return Validator::make($data, $rules);
    }

    protected function create(array $data){
        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}