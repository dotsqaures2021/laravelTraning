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

//Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->middleware('test')->name('admindashboard');
//Route::get('/admin/adduser', [App\Http\Controllers\Admin\UserController::class,'index']);
Route::match(['get', 'post'],'/login', [App\Http\Controllers\AdminController::class,'login'])->name('adminlogin');

Route::prefix('admin')->middleware(['test'])->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class,'index'])->name('admindashboard');
    Route::get('/logout', [App\Http\Controllers\AdminController::class,'logout'])->name('logout');;
    Route::get('/adduser', [App\Http\Controllers\Admin\UserController::class,'index'])->name('adduser');;
    Route::post('/adduser', [App\Http\Controllers\Admin\UserController::class,'submit'])->name('adduserpost');;
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class,'getuser'])->name('userlist');
    Route::get('/user/{id}', [App\Http\Controllers\Admin\UserController::class,'updateuser'])->name('updateuser');;
    Route::post('/user/{id}', [App\Http\Controllers\Admin\UserController::class,'updateuserdata'])->name('updateuserpost');;
    Route::delete('/delete/{id}', [App\Http\Controllers\Admin\UserController::class,'deleteuserdata'])->name('userlistafterdelete');
});

Route::resources([
    'photos' => App\Http\Controllers\Admin\UserController::class
]);

Route::post('/save', [App\Http\Controllers\UserController::class,'submit']);
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/user', function (Request $request) {
//     return view('register');
// });
// Route::post('/save', function (Request $request) {
//     dd($request->all());
//     //return view('welcome');
// });