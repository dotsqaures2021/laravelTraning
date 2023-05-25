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

    public function update(Request $request , $id){
        //return view('pages.brands.brand-update');
        if($request->isMethod('post')){
            $insertionData  = $request->except(['_token']);
            $data = Category::where('id',$id)->update($insertionData);  
            return redirect()->route('categories')->with('message', 'Record has been successfully updated');
        } 

        $product = Category::find($id);

        return view('pages.category.category-update',compact(['categories', 'brands','product']));
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
