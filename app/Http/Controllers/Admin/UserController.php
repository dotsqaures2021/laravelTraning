<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserPostRequest;

class UserController extends Controller
{
    public function index(){
        return view('pages.user-add');
    }
    public function submit(UserPostRequest $request){

        $insertionData  = $request->except(['_token']);
        $data = User::create($insertionData);       
        return view('pages.user-add');
    }
    public function getuser(Request $request){

        $users = User::get();
       // dd($data->pluck('name');
        return view('pages.user-list')->with('users', $users);
    }
    public function updateuser($id){

       // dd($id);

        $users = User::find($id);
       return view('pages.user-add',['user'=>$users]);
    }

    public function updateuserdata(Request $request, $id){

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $insertionData  = $request->except(['_token']);
        $data = User::where('id',$id)->update($insertionData);       
        return redirect()->route('userlist');
    }
}
