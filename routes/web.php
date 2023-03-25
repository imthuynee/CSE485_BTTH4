<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/login', function(){
        return view('login');
    });
    
    Route::post('/login', function (Request $request){
        //nhan du lieu tu form
        $credentials = $request->only('email','password');
    
        //xu ly khi ng dung an submit 
        if(Auth::attempt($credentials)){
            return redirect ('/admin');
        } 
        //neu dang nhap sai
        return redirect('/login')->withErrors(['email' => 'The provided creden do not match out record']);
    
    })-> name('login');