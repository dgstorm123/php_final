<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController; 

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

Route::get('/', [HomeController::class, 'homepage']);
    

route::get('post', [HomeController::class,'post']);

route::get('/home',[HomeController::class,'index'])-> middleware('auth') ->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

# chức năng của admin
Route::get('/post_page',[AdminController::class,'post_page']);   # tạo post của admin 

Route::post('/add_post', [AdminController::class, 'add_post'])->name('add_post');  

Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');

Route::get('/add_category', [AdminController::class, 'showAddCategoryForm'])->name('add_category');  

Route::get('/show_post',[AdminController::class,'show_post']); # showw tất cả các bài post 

Route::get('/delete_post/{id}',[AdminController::class,'delete_post']);  # xoá post

Route::get('/edit_post/{id}',[AdminController::class,'edit_post']);  # edit post

Route::get('/accept_post/{id}',[AdminController::class,'accept_post']); # chức năng duyệt bài viết (activate là đc )

Route::get('/reject_post/{id}',[AdminController::class,'reject_post']); # chức năng từ chối bài viết (reject)

Route::get('/user_count', [AdminController::class, 'user_count']);


# chức năng của user

Route::get('/create_post',[HomeController::class, 'create_post']) -> middleware('auth'); # tạo post của user 

Route::post('/user_post',[HomeController::class, 'user_post']) -> middleware('auth'); # tạo post của user 

Route::get('/post_details/{id}',[HomeController::class,'post_details']);  # xem chi tiết bài post ở phần readmore

Route::get('/my_post',[HomeController::class,'my_post']) -> middleware('auth'); # xem các bài post của mình 

Route::get('/my_post_delete/{id}',[HomeController::class,'my_post_delete']) -> middleware('auth');  # xoá bài viết 

Route::get('/my_post_edit/{id}',[HomeController::class,'my_post_edit']) -> middleware('auth');



