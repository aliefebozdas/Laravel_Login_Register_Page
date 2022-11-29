<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});
Route::redirect("/anasayfa","/home");
Route::redirect('/home/login_page.blade.php','/home/login');
Route::redirect('/home/register_page.blade.php','/home/register');
Route::redirect('/home/dashboard_page.blade.php','/home/dashboard');
//Route::redirect('/home/login-post','/home/update');
Route::get('/home',[\App\Http\Controllers\Front\HomeController::class,'index']);

Route::prefix('/home')->group(function (){
    Route::get('/login',[\App\Http\Controllers\Front\HomeController::class,'loginIndex']);
    Route::get('/register',[\App\Http\Controllers\Front\HomeController::class,'registerIndex']);
    Route::get('/dashboard',[\App\Http\Controllers\Front\HomeController::class,'updateIndex']);
    Route::get('/dashboard',[\App\Http\Controllers\Front\HomeController::class,'list']);
    Route::get('/dashboard/delete/{id}',[\App\Http\Controllers\Front\HomeController::class,'delete']);
    Route::get('/dashboard/edit/{id}',[\App\Http\Controllers\Front\HomeController::class,'showData']);
    Route::post('/edit',[\App\Http\Controllers\Front\HomeController::class,'update'])->name('edit');
    Route::post('/register-post',[\App\Http\Controllers\Front\HomeController::class,'register'])->name('register-post');
    Route::post('/login-post',[\App\Http\Controllers\Front\HomeController::class,'login'])->name('login-post');





    //Route::post('/update-post',[\App\Http\Controllers\Front\HomeController::class,'update'])->name('update');
    //Route::get('/update',[\App\Http\Controllers\Front\HomeController::class,'basarili'])->name('basarili');


});



//Route::get('/ali/{$id}',[\App\Http\Controllers\Front\HomeController::class,'test'])->where("id",'[0,9]+');
