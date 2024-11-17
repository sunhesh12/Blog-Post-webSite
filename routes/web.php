<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\welcomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [welcomeController::class,'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//post
Route::get('/post/{postId}/show',[PostController::class,'show'])->name('posts.show');

Route::group(['middleware'=> 'auth'], function(){
    Route::post('/post/store',[PostController::class,'store'])->name('posts.store');
    
    Route::get('/post/all',[HomeController::class,'allPost'])->name('posts.all');
    
    Route::get('/post/{postId}/edit',[PostController::class,'edit'])->name('posts.edit');
    
    Route::post('/post/{postId}/update',[PostController::class,'update'])->name('posts.update');
    
    Route::get('/post/{postId}/delete',[PostController::class,'delete'])->name('posts.delete');
});



//admin routes

Route::group(['middlware'=>'admin', 'prefix' =>'admin', 'as' =>'admin.'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('dashboard');
    // 'prefix' =>'admin', 'as' =>'admin.' prefix== admin/dashbord and as== admin.dashbord==> this iis name

});





