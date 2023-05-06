<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //
    public function index(){

        $brands = Brand::get();
        return view('pages.brand.brand-list')->with('brands', $brands);
    }

    public function submit(Request $request){

        if($request->isMethod('post')){

            $imageName = time().'.'.$request->image->extension();       
            $request->image->move(public_path('images'), $imageName);
            $insertionData  = $request->except(['_token']);
            $insertionData['image'] = $imageName;
            $data = Brand::create($insertionData);    

            return redirect()->route('brands')->with('message', 'Brand has been successfully created');

         }

        $brands = Brand::get();
        return view('pages.brand.brand-add')->with('brands', $brands);
    }

    public function update(){
        //return view('pages.brands.brand-update');
    }
    
}
