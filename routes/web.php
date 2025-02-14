<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\AdminLoginController;
use App\Http\Controllers\Admin\auth\AdminLogoutController;
use App\Http\Controllers\Admin\auth\AdminResetController;
use App\Http\Controllers\Admin\auth\AdminRegisterController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;

// logout
Route::get('logout',[AdminLogoutController::class,'logout'])->name('logout');

// admin routes role admin than middleware admin use prefix admin
Route::get('admin-login-form', [AdminLoginController::class, 'adminLoginForm'])->name('admin-login-form');

Route::post('admin-login-create', [AdminLoginController::class, 'adminCreate'])->name('admin-login-create');

Route::get('admin-register-form', [AdminRegisterController::class, 'adminRegisterForm'])->name('admin-register-form');
Route::post('admin-register', [AdminRegisterController::class, 'adminregister'])->name('admin-register-form-create');

Route::get('admin-reset-form', [AdminResetController::class, 'adminResetForm'])->name('admin-reset-form');
Route::post('admin-reset', [AdminResetController::class, 'adminreset'])->name('admin-reset-form-create');

Route::get('admin-OTP-form', [AdminResetController::class, 'adminotpform'])->name('admin-OTP-form');
Route::post('admin-verify-otp', [AdminResetController::class, 'adminverifyOtp'])->name('admin-verifyotp');

Route::get('admin-reset-password-form',[AdminResetController::class,'adminresetPasswordForm'])->name('reset-password-form');
Route::post('admin-reset-password',[AdminResetController::class,'adminResetPassword'])->name('admin-reset-password');


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dashboard');

    Route::get('admin-profile', [AdminController::class, 'profile'])->name('admin-profile');



    // product-lis
    Route::get('product-list',[ProductController::class,'productList'])->name('product-list');

    Route::get('product-create',[ProductController::class,'productCreate'])->name('product-create');
    Route::post('product-store',[ProductController::class,'productStore'])->name('product-store');

    Route::get('product-edit/{id}',[ProductController::class,'productEdit'])->name('product-edit');
    Route::post('product-update/{id}',[ProductController::class,'productUpdate'])->name('product-update');
    Route::get('product-delete/{id}', [ProductController::class, 'productDelete'])->name('product-delete');


    // category-list
    Route::get('category-list',[CategoryController::class,'categoryList'])->name('category-list');

    Route::get('category-create',[CategoryController::class,'categoryCreate'])->name('category-create');
    Route::post('category-store',[CategoryController::class,'categoryStore'])->name('category-store');

    Route::get('category-edit/{id}',[CategoryController::class,'categoryEdit'])->name('category-edit');
    Route::post('category-update/{id}',[CategoryController::class,'categoryUpdate'])->name('category-update');
    Route::get('category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category-delete');






});

// home
Route::get('/',[HomeController::class,'home'])->name('home');
