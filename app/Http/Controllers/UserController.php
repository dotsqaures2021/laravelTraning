<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
        return view('register');
    }
    public function submit(Request $request){
        $data = $request->input();
        $user = DB::table('user')->insert([
            'name' => $data['email'],
            'password' =>  $data['password'],
            'created_at'=> date('Y-m-d')

        ]);       
        dd(DB::table('user')->pluck('name','id'));
        return view('save');
    }
}
