<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColourController;
use App\Http\Controllers\HomeController;

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


Route::post('/admin', [AuthController::class, 'login']);
Route::get('/admin', [Authcontroller::class, 'login'])->name('admin.login');

Route::get('/admin/register', [Authcontroller::class, 'register'])->name('admin.register');
Route::post('/admin/register', [Authcontroller::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category.menu');
Route::get('/category/{category}/{subcategory}', [HomeController::class, 'subcategory'])->name('subcategory.menu');


Route::group(['middleware' => 'admin'], function(){

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/admin/list', [AdminController::class, 'index'])->name('admin.list');
    Route::match(['get', 'post'], 'admin/admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::match(['get', 'post'], 'admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    Route::get('admin/category/list', [CategoryController::class, 'index'])->name('category.list');
    Route::match(['get', 'post'], 'admin/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::match(['get', 'post'], 'admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('admin/sub_category/list', [SubCategoryController::class, 'index'])->name('sub_category.list');
    Route::match(['get', 'post'], 'admin/sub_category/add', [SubCategoryController::class, 'add'])->name('sub_category.add');
    Route::match(['get', 'post'], 'admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete'])->name('sub_category.delete');

    Route::get('admin/product/list', [ProductController::class, 'index'])->name('product.list');
    Route::match(['get', 'post'], 'admin/product/add', [ProductController::class, 'add'])->name('product.add');
    Route::match(['get', 'post'], 'admin/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('/get-subcategories/{category}', [ProductController::class, 'getSubcategories']);

    Route::get('admin/brand/list', [BrandController::class, 'index'])->name('brand.list');
    Route::match(['get', 'post'], 'admin/brand/add', [BrandController::class, 'add'])->name('brand.add');
    Route::match(['get', 'post'], 'admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');

    Route::get('admin/colour/list', [ColourController::class, 'index'])->name('colour.list');
    Route::match(['get', 'post'], 'admin/colour/add', [ColourController::class, 'add'])->name('colour.add');
    Route::match(['get', 'post'], 'admin/colour/edit/{id}', [ColourController::class, 'edit'])->name('colour.edit');
    Route::get('admin/colour/delete/{id}', [ColourController::class, 'delete'])->name('colour.delete');
});

