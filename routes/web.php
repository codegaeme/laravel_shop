<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'loginForm'])->name('loginForm');

Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('registerpost',[AuthController::class,'registerpost'])->name('registerpost');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('/dashboard',function(){
    return view('admin.home.dboard');
})->name('admin');
Route::get('/',function(){
    return view('client.home.home');
})->name('home');


//route admin
Route::prefix('admin')->as('admin.')->middleware('checkadmin')
->group(function(){
    Route::get('/',function(){
        return view('admin.home.dboard');
    });
    Route::resource('categories',App\Http\Controllers\Admin\CategoriesController::class);
    Route::get('aa',function(){
        return ('123');
    });
});



Route::prefix('profile')->as('profile.')->group(function(){






    Route::get('/user/{id}',[App\Http\Controllers\UserController::class,'showprofileuser'])->name('user');
    Route::get('/useredit/{id}',[App\Http\Controllers\UserController::class,'showprofileuseredit'])->name('useredit');
    Route::get('/admin/{id}',[App\Http\Controllers\UserController::class,'showprofileadmin'])->name('admin');
    Route::get('/adminedit/{id}',[App\Http\Controllers\UserController::class,'showprofileadminedit'])->name('adminedit');
    Route::put('user/{id}', [App\Http\Controllers\UserController::class,'editProfile'])->name('editprofile');
    Route::put('admin/{id}', [App\Http\Controllers\UserController::class,'editProfileAdmin'])->name('editprofileadmin');


});




