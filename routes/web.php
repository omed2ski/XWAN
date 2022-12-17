<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');


// for comments

Route::post('comments',[CommentController::class,'store'])->name('comments.store');
Route::post('delete-comment',[CommentController::class,'destroy']);

// normal browsing
Route::get('/',[FrontendController::class,'index'])->name('welcome');

// mail
// Route::get('contact',function(){
//     Mail
// })

Route::get('contact',[ContactController::class,'show'])->name('contact.show');
Route::post('contact',[ContactController::class,'submit'])->name('contact.send');

Route::get('kitchen/{category_slug}',[FrontendController::class,'viewCategoryPost']);

Route::get('kitchen/{category_slug}/{post_slug}',[FrontendController::class,'viewPost']);
Route::get('about-us',[FrontendController::class,'aboutUs'])->name('home.about');

// just for admins

Route::prefix('admin')->middleware(['auth','isAdmin'])->group( function(){

    Route::get('/dashboard',[dashboardController::class,'index'])->name('admin.dash');

    Route::resource('category',CategoryController::class,['except' => ['create', 'show','edit']]);

    Route::resource('posts',PostController::class,['except' => ['create', 'show','edit']]);

    Route::resource('users',UserController::class,['except' => ['create', 'show','edit']]);

    Route::get('settings',[SettingController::class,'index']);
    Route::Post('settings',[SettingController::class,'saveData']);
});

