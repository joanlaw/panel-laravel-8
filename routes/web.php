<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Models\Matche;



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
    return redirect()->route('allproducts');
})->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\UserControlle::class, 'index'])->name('admin')->middleware('auth');
Route::get('/categories', [App\Http\Controllers\CategorieController::class, 'index'])->name('categorie')->middleware('auth');
Route::get('/add-categorie', [App\Http\Controllers\CategorieController::class, 'add'])->name('addcategorie')->middleware('auth');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products')->middleware('auth');
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'add'])->name('addproduct')->middleware('auth');


Route::get('/users', [App\Http\Controllers\UserControlle::class, 'users'])->name('users')->middleware('auth');

Route::get('/adduser', [App\Http\Controllers\UserControlle::class, 'adduser'])->name('adduser')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/allproducts', [App\Http\Controllers\ProductController::class, 'allproducts'])->name('allproducts')->middleware('auth');
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'showproduct'])->name('showproduct')->middleware('auth');
