<?php

use App\Http\Controllers\Admin\Product\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\facerController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Customer\Product\ProductController as Product;

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
//admin page
Route::prefix("admin")->group(function (){

    //admin-dashboard
    Route::get("/",[AdminDashboardController::class,"index"]);

    //admin-category
    Route::prefix('category')->group(function(){
        Route::get('/' , [CategoryController::class , 'index'])->name('admin.category.index');
        Route::get('/create' , [CategoryController::class , 'create'])->name('admin.category.create');
        Route::post('/store' , [CategoryController::class , 'store'])->name('admin.category.store');
        Route::get('/edit/{category}' , [CategoryController::class , 'edit'])->name('admin.category.edit');
        Route::put('/update/{category}' , [CategoryController::class , 'update'])->name('admin.category.update');
        Route::delete('/destroy/{category}' , [CategoryController::class , 'destroy'])->name('admin.category.destroy');
        Route::get('/change/{category}' , [CategoryController::class , 'change'])->name('admin.category.change');
    });

    //admin-category
    Route::prefix('banner')->group(function(){
        Route::get('/' , [BannerController::class , 'index'])->name('admin.banner.index');
        Route::get('/create' , [BannerController::class , 'create'])->name('admin.banner.create');
        Route::post('/store' , [BannerController::class , 'store'])->name('admin.banner.store');
        Route::get('/edit/{banner}' , [BannerController::class , 'edit'])->name('admin.banner.edit');
        Route::put('/update/{banner}' , [BannerController::class , 'update'])->name('admin.banner.update');
        Route::delete('/destroy/{banner}' , [BannerController::class , 'destroy'])->name('admin.banner.destroy');
        Route::get('/change/{banner}' , [BannerController::class , 'change'])->name('admin.banner.change');
    });
    //admin-category
    Route::prefix('comment')->group(function(){
        Route::get('/' , [CommentController::class , 'index'])->name('admin.comment.index');
        Route::get('/create' , [CommentController::class , 'create'])->name('admin.comment.create');
        Route::post('/store' , [CommentController::class , 'store'])->name('admin.comment.store');
        Route::get('/edit/{comment}' , [CommentController::class , 'edit'])->name('admin.comment.edit');
        Route::put('/update/{comment}' , [CommentController::class , 'update'])->name('admin.comment.update');
        Route::delete('/destroy/{comment}' , [CommentController::class , 'destroy'])->name('admin.comment.destroy');
        Route::get('/change/{comment}' , [CommentController::class , 'change'])->name('admin.comment.change');
        Route::get('/approved/{comment}' , [CommentController::class , 'approved'])->name('admin.approved.change');
    });
    //admin-user
    Route::prefix('user')->group(function(){
        Route::get('/' , [UserController::class , 'index'])->name('admin.user.index');
        Route::get('/adminUser' , [UserController::class , 'adminUser'])->name('admin.user.adminUser');
        Route::delete('/destroy/{user}' , [UserController::class , 'destroy'])->name('admin.user.destroy');

    });
    //admin-product
    Route::prefix('product')->group(function(){
        Route::get('/' , [ProductController::class , 'index'])->name('admin.product.index');
        Route::get('/create' , [ProductController::class , 'create'])->name('admin.product.create');
        Route::post('/store' , [ProductController::class , 'store'])->name('admin.product.store');
        Route::get('/edit/{product}' , [ProductController::class , 'edit'])->name('admin.product.edit');
        Route::put('/update/{product}' , [ProductController::class , 'update'])->name('admin.product.update');
        Route::delete('/destroy/{product}' , [ProductController::class , 'destroy'])->name('admin.product.destroy');

    });






});


//home page
Route::get("/",[HomeController::class,"index"]);
Route::get("/product/{product}",[Product::class,"product"])->name("home.product");
Route::get("/product/add_favorite/{product}",[Product::class,"add_favorite"])->name("home.product.add_favorite");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
