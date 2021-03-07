<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Takeaway;
use App\Http\Livewire\Product;
use App\Http\Livewire\Category;
use App\Http\Livewire\Options;
use App\Http\Livewire\Ordermethods;
use App\Http\Livewire\Profile;
use App\Http\Livewire\CustomerHome;
use App\Http\Livewire\AdminHome;
use App\Http\Livewire\Reports;

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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/categories', Category::class)->name('categories');
    Route::get('/products', Product::class)->name('products');
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/takeaway', Takeaway::class)->name('takeaway');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/customer-home', CustomerHome::class)->name('customer-home');
    Route::get('/admin-home', AdminHome::class)->name('admin-home');
    Route::get('/options', Options::class)->name('options');
    Route::get('/ordermethods', Ordermethods::class)->name('ordermethods');
    Route::get('/reports', Reports::class)->name('reports');
});
