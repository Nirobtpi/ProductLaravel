<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    // return view('backend.dashboard');
});
Route::get('/add-product',[ProductController::class,"addProductUrl"]);
Route::post('/add-product',[ProductController::class,'addProduct']);
Route::get('/view-product',[ProductController::class,'viewProductUrl']);
Route::get('/edit-product/{id}',[ProductController::class,'editProductUrl']);
Route::post('/update-product',[ProductController::class,'updateProduct']);
Route::get('/delete-product/{id}',[ProductController::class,'deleteProduct']);
Route::get('/deleted-product',[ProductController::class,'deletedDataView']);
Route::get('/restore-product/{id}',[ProductController::class,'restoreData']);
Route::get('/pdelete-product/{id}',[ProductController::class,'pdelete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
