<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ProductController extends Controller
{
    //

    public function index(){

        $products = Product::get();
        return view('pages.product.product-list')->with('products', $products);
    }

    public function submit(Request $request){

        if($request->isMethod('post')){

            $imageName = time().'.'.$request->image->extension();       
            $request->image->move(public_path('images'), $imageName);
            $insertionData  = $request->except(['_token']);
            $insertionData['image'] = $imageName;
            $data = Product::create($insertionData);    

            return redirect()->route('products')->with('message', 'Product has been successfully created');
         }

        $brands = Brand::get();
        return view('pages.product.product-add')->with('brands', $brands);
    }

    public function update(){
        //return view('pages.brands.brand-update');
    }
}
