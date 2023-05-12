<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::match(['get', 'post'],'/login', [App\Http\Controllers\LoginController::class,'login'])->name('adminlogin');

Route::prefix('admin')->middleware(['test'])->group(function () {
    Route::get('/', [App\Http\Controllers\LoginController::class,'index'])->name('admindashboard');
    Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');;
    Route::get('/adduser', [App\Http\Controllers\Admin\UserController::class,'index'])->name('adduser');;
    Route::post('/adduser', [App\Http\Controllers\Admin\UserController::class,'submit'])->name('adduserpost');;
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class,'getuser'])->name('userlist');
    Route::get('/user/{id}', [App\Http\Controllers\Admin\UserController::class,'updateuser'])->name('updateuser');;
    Route::post('/user/{id}', [App\Http\Controllers\Admin\UserController::class,'updateuserdata'])->name('updateuserpost');;
    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\UserController::class,'deleteuserdata'])->name('userlistafterdelete');

    Route::get('/brands', [App\Http\Controllers\BrandController::class,'index'])->name('brands');
    Route::match(['get', 'post'],'/addbrand', [App\Http\Controllers\BrandController::class,'submit'])->name('addbrand');
    Route::match(['get', 'post'],'/updatebrand/{id}', [App\Http\Controllers\BrandController::class,'update'])->name('updatebrand');
    Route::delete('/branddelete/{id}', [App\Http\Controllers\BrandController::class,'delete'])->name('brandlistafterdelete');

    Route::get('/products', [App\Http\Controllers\ProductController::class,'index'])->name('products');
    Route::match(['get', 'post'],'/addproduct', [App\Http\Controllers\ProductController::class,'submit'])->name('addproduct');
    Route::match(['get', 'post'],'/updateproduct/{id}', [App\Http\Controllers\ProductController::class,'update'])->name('updateproduct');
    Route::delete('/productdelete/{id}', [App\Http\Controllers\ProductController::class,'delete'])->name('productlistafterdelete');

    Route::get('/categories', [App\Http\Controllers\CategoryController::class,'index'])->name('categories');
    Route::match(['get', 'post'],'/addcategory', [App\Http\Controllers\CategoryController::class,'submit'])->name('addcategories');
    Route::match(['get', 'post'],'/updatecategory/{id}', [App\Http\Controllers\CategoryController::class,'update'])->name('updatecategories');
    Route::delete('/categorydelete/{id}', [App\Http\Controllers\CategoryController::class,'delete'])->name('categorieslistafterdelete');

});


Route::resources([
    'photos' => App\Http\Controllers\Admin\UserController::class
]);

