<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('pages.user-add');
    }
    public function submit(Request $request){

        $insertionData  = $request->except(['_token']);
        $data = User::create($insertionData);       
        return view('pages.user-add');
    }
    public function getuser(Request $request){

        $users = User::get();
       // dd($data->pluck('name');
        return view('pages.user-list')->with('users', $users);
    }
}
