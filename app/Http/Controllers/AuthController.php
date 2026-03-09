<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   
    //show login gotm 
    public function showLogin(){
       
    
        return view('login');
    }
    //checklogin
    public function checkLogin(Request $request){
         $account = $request->only('email','password');
        if(Auth::attempt($account)){
            return redirect('/admin');
        }

        return redirect('/login')->with('error','Email or password incorrect!');
        }

    //logout
  
}
