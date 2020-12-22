<?php

use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\WelcomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/sendtocart/{product}', [ShopCartController::class, 'add'])->name('cart.add')->middleware('auth');

Route::get('/shoppingcart', [ShopCartController::class, 'index'])->name('shoppingcart.index')->middleware('auth');
Route::get('/shoppingcart/destroy/{itemId}', [ShopCartController::class, 'destroy'])->name('shoppingcart.destroy')->middleware('auth');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');
