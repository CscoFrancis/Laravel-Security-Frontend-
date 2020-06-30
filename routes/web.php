<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
           Route::get('/login', 'LoginController@showLoginForm')->name('login');
           Route::post('/login', 'LoginController@login');
           Route::post('/logout', 'LoginController@logout')->name('logout');
           Route::get('/register', 'RegisterController@showRegisterForm')->name('register');
           Route::post('/register', 'RegisterController@register');
    });
    
    Route::get('/products', 'Products@index')->name('products');
    Route::get('/products/view', 'Products@view')->name('products.view');
    Route::get('/products/create', 'Products@create')->name('products.create');
});

Route::namespace('Auth')->group(function(){
    //Login
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::get('/register', 'RegisterController@showRegisterForm')->name('register');
    Route::post('/register', 'RegisterController@register');
    //others 
});
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth:web');
Route::get('/', function () {
    return view('welcome');
});



