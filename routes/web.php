<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TagController ;
use App\Http\Controllers\HomeController ;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin-panel/dashboard', function () {
    return view('admin.dashboard');
});
Route::prefix('/admin-panel/management')->name('admin.')->group( function () {
    Route::resource('brands',BrandController::class);
    Route::resource('attributes',AttributeController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannerController::class);
    Route::get('products/{product}/images-edit', [ProductImageController::class,'edit'])->name('products.images.edit');
    Route::get('products/{product}/category-edit', [ProductController::class,'editCategory'])->name('products.category.edit');

    //get category attributes
    Route::get('/category-attributes/{category}',[CategoryController::class,'getCategoryAttributes']);
});

Route::get('/', [HomeController::class,'index'])->name('home');
