<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class LoginController extends Controller
{
     public function index(){
        return view('pages.admin');
     }
     public function login(Request $request){

         //dd(Hash::make(123456789));
         if($request->isMethod('post')){
            if (Auth::guard('admin')->attempt(['email'=> $request->email , 'password' => $request->password])) {
               return redirect()->route('admindashboard');
            }
            else{
               return redirect()->back()->with('message','login failed');
            }
         }
        return view('pages.login');
     }

     public function logout(Request $request){
         Auth::guard('admin')->logout();
         return redirect('/login');
     }

}
