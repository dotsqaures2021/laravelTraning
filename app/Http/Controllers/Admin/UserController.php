<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserPostRequest;
use Hash;

class UserController extends Controller
{
    public function index(){
        return view('pages.user-add');
    }
    public function submit(UserPostRequest $request){
       // dd($request);

        $imageName = time().'.'.$request->image->extension();       
        $request->image->move(public_path('images'), $imageName);
        $insertionData  = $request->except(['_token']);
        $insertionData['password'] = Hash::make($request->password);
        $insertionData['image'] = $imageName;
        $data = User::create($insertionData);       
        //return view('pages.user-add');
        return redirect()->route('userlist')->with('message', 'Record has been successfully created');
    }
    public function getuser(Request $request){

        $users = User::get();
       // dd($data->pluck('name');
        return view('pages.user-list')->with('users', $users);
    }
    public function updateuser($id){

       // dd($id);
        $users = User::find($id);
       return view('pages.user-edit',['user'=>$users]);
    }

    public function updateuserdata(Request $request, $id){

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
        ]);

        $insertionData  = $request->except(['_token']);
        $data = User::where('id',$id)->update($insertionData);       
        return redirect()->route('userlist')->with('message', 'Record has been successfully updated');
    }

    public function deleteuserdata($id){

        // $request->validate([
        //     'email' => 'required|email|unique:users,email,'.$id,
        // ]);
        
        //dd($id);
        $data=User::find($id);
        $data->delete($data->id);       
        return redirect()->route('userlist')->with('message', 'Record has been successfully deleted');
    }
}
