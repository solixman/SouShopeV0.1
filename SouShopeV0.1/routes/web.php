<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/Product',[ProductController::class,'ShowProductsforAdmin']);

Route::get('/client/Product',[ProductController::class,'ShowProductsforClient']);

Route::get('/admin/users',[ProductController::class,'ShowUsersForClient']);

Route::get('/Product/update/form',[ProductController::class,'showUpdateForm']);

Route::get('/Product/update',[ProductController::class,'updateProduct']);

Route::get('/Product/add',[ProductController::class,'CreateProduct']);

Route::get('/Product/delete',[ProductController::class,'DeleteProduct']);

Route::get('/Product/details',[ProductController::class, 'ShowProductDetails']);


Route::get('/AddProduct', function () {
    return view('Testing');
});


// Route::get('/Test/add',[ProductController::class, 'ShowProductDetails']);

Route::get('/Product/add/cart',[ProductController::class, 'AddProductToSession']);
Route::get('/cart',[ProductController::class, 'ProductsTocart']);
Route::get('/Product/delete/cart',[ProductController::class, 'RemoveFromCart']);
Route::get('/checkout',[OrderController::class,'checkout']);
