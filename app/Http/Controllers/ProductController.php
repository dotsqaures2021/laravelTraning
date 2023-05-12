<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function index(){

        $products = Product::with(['brand', 'category'])->get();
        //dd($products);
        // $product = new Product;
        // $brand = $product->brand();
        // // dd($brand->name);
        return view('pages.product.product-list')->with('products', $products);
    }

    public function submit(Request $request){

        if($request->isMethod('post')){
            
            $brand = Brand::find($request->brand_id);
            $product = new Product;
           //  dd($brand);

           // $profile->user()->associate($user);
            $imageName = time().'.'.$request->image->extension();       
            $request->image->move(public_path('images'), $imageName);
            $insertionData  = $request->except(['_token']);
            $insertionData['image'] = $imageName;
            // $insertionData['brand_id'] = 15;
            //$product->brand()->associate($brand);
            $data = Product::create($insertionData);    

            return redirect()->route('products')->with('message', 'Product has been successfully created');
         }

        $brands = Brand::get();
        $categories = Category::get();
        return view('pages.product.product-add',compact(['categories', 'brands']));
    }

    public function update(Request $request, $id){

        if($request->isMethod('post')){
            $insertionData  = $request->except(['_token']);
            $data = Product::where('id',$id)->update($insertionData);  
            return redirect()->route('products')->with('message', 'Record has been successfully updated');
        } 

        $product = Product::find($id);
       // return view('pages.user-edit',['user'=>$users]);

        $brands = Brand::get();
        $categories = Category::get();
        return view('pages.product.product-update',compact(['categories', 'brands','product']));

    }

    public function delete($id){

        // $request->validate([
        //     'email' => 'required|email|unique:users,email,'.$id,
        // ]);
        
        //dd($id);
        $data=Product::find($id);
        $data->delete($data->id);       
        return redirect()->route('products')->with('message', 'Record has been successfully deleted');
    }
}
