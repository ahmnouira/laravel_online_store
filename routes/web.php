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


Route::get('/', function () {
    $viewData = [];
    $viewData['title'] = "Home Page - Online Store";
    return view('home.index')->with("viewData", $viewData);
});

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('products.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');

# Admin

// $adminUrl = "App\Http\Controllers\Admin";
// $adminHomeController = $adminUrl . '\AdminHomeController';

Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductsController@index')->name('admin.products.index');
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductsController@store')->name('admin.products.store');
Route::post('/admin/products/store2', 'App\Http\Controllers\Admin\AdminProductsController@store2')->name('admin.products.store2');
Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductsController@delete')->name('admin.products.delete');
# Edit
Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductsController@edit')->name('admin.products.edit');
Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductsController@update')->name('admin.products.update');
