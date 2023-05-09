<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){

        $categories = Category::get();
        return view('pages.category.category-list')->with('categories', $categories);
    }

    public function submit(Request $request){

        if($request->isMethod('post')){

            $imageName = time().'.'.$request->image->extension();       
            $request->image->move(public_path('images'), $imageName);
            $insertionData  = $request->except(['_token']);
            $insertionData['image'] = $imageName;
            $data = Category::create($insertionData);    

            return redirect()->route('categories')->with('message', 'Brand has been successfully created');

         }

        $categories = Category::get();
        return view('pages.category.category-add')->with('categories', $categories);
    }

    public function update(){
        //return view('pages.brands.brand-update');
    }

    public function delete($id){

        // $request->validate([
        //     'email' => 'required|email|unique:users,email,'.$id,
        // ]);
        
        //dd($id);
        $data=Category::find($id);
        $data->delete($data->id);       
        return redirect()->route('categories')->with('message', 'Record has been successfully deleted');
    }
}
