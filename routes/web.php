<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsContoller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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
///////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/categoryindex', [CategoriesController::class,'index'])->name('categories.index');
Route::get('/categoryCreate', [CategoriesController::class,'Create'])->name('categories.Create');
Route::post('/StoreCategory', [CategoriesController::class,'Store'])->name('categories.Store');
Route::get('/editCategory/{Category}/edit', [CategoriesController::class,'edit'])->name('categories.edit');
Route::PUT('/updateCategory/{Category}', [CategoriesController::class,'update'])->name('categories.update');
// Route::get('/deleteCategory/{Category}', [CategoriesController::class,'destroy'])->name('categories.destroy');
Route::delete('/deleteCategory/{Category}', [CategoriesController::class,'destroy'])->name('categories.destroy');
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/productsindex', [ProductsContoller::class,'index'])->name('products.index');
Route::get('/productsCreate', [ProductsContoller::class,'Create'])->name('products.Create');
Route::get('/productsShow/{Product}', [ProductsContoller::class,'show'])->name('products.show');
Route::post('/productsStore', [ProductsContoller::class,'store'])->name('products.store');
Route::get('/productsCreate/{Product}/edit', [ProductsContoller::class,'edit'])->name('products.edit');
Route::PUT('/productsupdate/{Product}', [ProductsContoller::class,'update'])->name('products.update');
 Route::get('/productdelete/{Product}', [ProductsContoller::class,'destroy'])->name('products.destroy');
 /////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/userCreate', [UsersController::class,'Create'])->name('auth.Create');
Route::post('/Storeuser', [UsersController::class,'Store'])->name('auth.Store');
////////////////////////////////////////////////////////////////////////////////////
Route::get('/showloginform', [UsersController::class,'showloginform'])->name('auth.showloginform');
Route::post('/login', [UsersController::class,'login'])->name('auth.login');
Route::get('/usersIndex', [UsersController::class,'index'])->name('users.index');
Route::get('/getSignOut', [UsersController::class,'getSignOut'])->name('users.getSignOut');
///////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/showCart', [CartController::class,'showCart'])->name('cart.index');
Route::post('/addToCart/{Product}', [CartController::class,'addToCart'])->name('users.addToCart');
Route::get('/cash', [OrderController::class,'cash'])->name('cart.cash');