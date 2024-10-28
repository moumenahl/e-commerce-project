<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;


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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('admin/categories' , CategoryController::class);
Route::resource('admin/products' , ProductController::class);
Route::get('/trash/products', [ProductController::class, 'trash'])->name('products.trash');
Route::put('/products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::resource('admin/orders' ,OrderController::class);
Route::get('/orders/accept/{id}', [OrderController::class, 'acceptOrder'])->name('orders.accept');
Route::get('/orders/deny/{id}', [OrderController::class, 'denyOrder'])->name('orders.deny');
});

// Route::middleware(['auth', 'role:customer'])->group(function () {
// Route::get('/customer', function () { return 'Welcome Customer'; });
// Route::resource('customer/orders' , OrderController::class);
// });
