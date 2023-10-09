<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Banner\BannerController;
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
        Route::get('/edit/{category}' , [BannerController::class , 'edit'])->name('admin.banner.edit');
        Route::put('/update/{category}' , [BannerController::class , 'update'])->name('admin.banner.update');
        Route::delete('/destroy/{category}' , [BannerController::class , 'destroy'])->name('admin.banner.destroy');
        Route::get('/change/{category}' , [BannerController::class , 'change'])->name('admin.banner.change');
    });






});

