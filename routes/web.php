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
    Route::get('/updatebrand', [App\Http\Controllers\BrandController::class,'update'])->name('updatebrand');

    Route::get('/products', [App\Http\Controllers\ProductController::class,'index'])->name('products');
    Route::get('/addproduct', [App\Http\Controllers\ProductController::class,'submit'])->name('addproduct');
    Route::get('/updateproduct', [App\Http\Controllers\ProductController::class,'update'])->name('updateproduct');

});


Route::resources([
    'photos' => App\Http\Controllers\Admin\UserController::class
]);

