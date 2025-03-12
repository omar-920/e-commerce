<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/' , [CommerceController::class,'viewPage'])->middleware('auth')->name('viewIndex');
Route::get('/products' , [CommerceController::class,'viewProducts'])->middleware('auth')->name('viewProduct');
Route::get('/single-product/{id}' , [CommerceController::class,'viewSingle'])->middleware('auth')->name('products.single');

//middleware
Route::get('productDetail' , [ProductController::class,'viewPage'])->middleware('auth')->name('productDetail');
// Route::get('Cart' , [CartController::class,'viewPage'])->middleware('auth')->name('viewCart');
//end of midlleware

//Rigester And Login Routes

Route::post('/register',[UserController::class,'register'])->middleware('guest')->name('register');

// Route::get('/loginPage' , [UserController::class,'viewPage'])->name('loginPage');
Route::get('/login', [UserController::class, 'viewPage'])->middleware('guest')->name('login');

Route::post('/loginAction',[UserController::class,'login'])->middleware('guest')->name('loginAction');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/admin',[AdminController::class,'viewDashboard'])->middleware('IsAdmin')->name('dashboard');
Route::get('/admin/admins',[AdminController::class,'viewAdmins'])->middleware('IsAdmin')->name('viewAdmins');
Route::post('/admin/admins/add',[AdminController::class,'storeAdmin'])->middleware('IsAdmin')->name('admins.store');
Route::put('/admin/admins/{id}/edit',[AdminController::class,'adminsEdit'])->middleware('IsAdmin')->name('admins.edit');
Route::delete('/admin/admins/{id}/delete',[AdminController::class,'adminsDelete'])->middleware('IsAdmin')->name('admins.delete');

Route::get('/admin/users',[UserController::class,'getUsers'])->middleware('IsAdmin')->name('viewUsers');
Route::post('/admin/users/add',[UserController::class,'storeUser'])->middleware('IsAdmin')->name('user.store');
Route::put('/admin/users/{id}/edit',[UserController::class,'usersEdit'])->middleware('IsAdmin')->name('user.edit');
Route::delete('/admin/users/{id}/delete',[UserController::class,'usersDelete'])->middleware('IsAdmin')->name('user.delete');

Route::get('/admin/categories',[CategoryController::class,'view'])->middleware('IsAdmin')->name('cat.view');
Route::post('/admin/categories/add',[CategoryController::class,'store'])->middleware('IsAdmin')->name('cat.store');
Route::put('/admin/categories/{id}/edit',[CategoryController::class,'update'])->middleware('IsAdmin')->name('cat.edit');
Route::delete('/admin/categories/{id}/delete',[CategoryController::class,'destroy'])->middleware('IsAdmin')->name('cat.delete');

Route::get('/admin/products',[ProductController::class,'view'])->middleware('IsAdmin')->name('product.view');
Route::post('/admin/products/add',[ProductController::class,'store'])->middleware('IsAdmin')->name('product.store');
Route::put('/admin/products/{id}/edit',[ProductController::class,'update'])->middleware('IsAdmin')->name('product.edit');
Route::delete('/admin/products/{id}/delete',[ProductController::class,'destroy'])->middleware('IsAdmin')->name('product.delete');

Route::get('/cart',[CartController::class,'getCart'])->middleware('auth')->name('getCart');
Route::post('/cart/{id}',[CartController::class,'addToCart'])->middleware('auth')->name('addToCart');
Route::delete('/cart/{id}',[CartController::class,'Delete'])->middleware('auth')->name('cart.delete');

Route::get('/sendToWhatsApp',[CartController::class,'sendToWhatsApp'])->middleware('auth')->name('sendToWhatsApp');