<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\AdminLoginController;
use App\Http\Controllers\Admin\auth\AdminResetController;
use App\Http\Controllers\Admin\auth\AdminRegisterController;
use App\Http\Controllers\Admin\Product\CategoryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Product\SubCategoryController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Product\CartPageController;
use App\Http\Controllers\Product\ProductPageController;





Route::get('admin-register-form', [AdminRegisterController::class, 'adminRegisterForm'])->name('admin.register.form');
Route::post('admin-register', [AdminRegisterController::class, 'adminregister'])->name('admin.register.create');

Route::get('admin/login/form', [AdminLoginController::class, 'adminLoginForm'])->name('admin.login.form');
Route::post('admin/login/create', [AdminLoginController::class, 'adminCreate'])->name('admin.login.create');

Route::get('admin/reset/form', [AdminResetController::class, 'adminResetForm'])->name('admin.reset.form');
Route::post('admin/reset', [AdminResetController::class, 'adminreset'])->name('admin.reset.create');

Route::get('admin/OTP/form', [AdminResetController::class, 'adminotpform'])->name('admin.OTP.form');
Route::post('admin/verify/otp', [AdminResetController::class, 'adminverifyOtp'])->name('admin.verifyotp');

Route::get('admin/reset/password/form',[AdminResetController::class,'adminresetPasswordForm'])->name('admin.reset.password.form');
Route::post('admin/reset/password',[AdminResetController::class,'adminResetPassword'])->name('admin.reset.password');










Route::prefix('admin')->middleware(['VerifyToken'])->group(function () {


    Route::get('dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('admin-profile', [AdminController::class, 'profile'])->name('admin-profile');



    // product-list
    Route::get('product/list',[ProductController::class,'productList'])->name('product-list');

    Route::get('product/create',[ProductController::class,'productCreate'])->name('product-create');
    Route::post('product/store',[ProductController::class,'productStore'])->name('product-store');

    Route::get('/product/edit/{id}', [ProductController::class, 'productEdit'])->name('product-edit');

    Route::post('/product/update/{id}', [ProductController::class, 'productUpdate'])->name('product-update');

    Route::get('/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product-delete');

    // new product
    Route::get('new/product/list',[ProductController::class,'productNewList'])->name('new-product-list');

    Route::get('new/products/edit/{id}', [ProductController::class, 'editNewProduct'])->name('new-product-edit');
    Route::post('new/products/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');



    Route::get('special/product/list',[ProductController::class,'productSpecialList'])->name('special-product-list');

    Route::get('top/product/list',[ProductController::class,'productTopList'])->name('top-product-list');

    Route::get('popular/product/list',[ProductController::class,'productPopularList'])->name('popular-product-list');

    //
    // Route::get('/offer-list', [OfferController::class, 'index'])->name('offer.list');
    //     Route::get('/offer-create', [OfferController::class, 'create'])->name('offer.create');
    // Route::post('/offer/store', [OfferController::class, 'store'])->name('offer.store');
    // Route::get('/offer/edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
    // Route::post('/offer/update/{id}', [OfferController::class, 'update'])->name('offer.update');
    // Route::delete('/offer/delete/{id}', [OfferController::class, 'destroy'])->name('offer.delete');

    // category-list
    Route::get('category/list',[CategoryController::class,'categoryList'])->name('category-list');

    Route::get('category/create',[CategoryController::class,'categoryCreate'])->name('category-create');
    Route::post('category/store',[CategoryController::class,'categoryStore'])->name('category-store');

    Route::get('category/edit/{id}',[CategoryController::class,'categoryEdit'])->name('category-edit');
    Route::post('category/update/{id}',[CategoryController::class,'categoryUpdate'])->name('category-update');
    Route::get('category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category-delete');

    // subcategory
    Route::get('subcategory/list',[SubCategoryController::class,'subCategoryList'])->name('subcategory-list');

    Route::get('subcategory/create',[SubCategoryController::class,'subCategoryCreate'])->name('subcategory-create');
    Route::post('subcategory/store',[SubCategoryController::class,'subCategoryStore'])->name('subcategory-store');

    Route::post('subcategory/store',[SubCategoryController::class,'subCategoryStore'])->name('subcategory-store');

    Route::get('subcategory/edit/{id}',[SubCategoryController::class,'subCategoryEdit'])->name('subcategory-edit');
    Route::put('subcategory/update/{id}',[SubCategoryController::class,'subCategoryUpdate'])->name('subcategory-update');
    Route::get('subcategory/delete/{id}', [SubCategoryController::class, 'subCategoryDelete'])->name('subcategory-delete');


});



// User LOgin Web Route

Route::get('register/form',[RegisterController::class,'registerForm'])->name('register.form');
Route::post('register/store',[RegisterController::class,'Register'])->name('register');

Route::get('login/form',[LoginController::class,'loginForm'])->name('login.form');
Route::post('login/create',[LoginController::class,'loginCreate'])->name('login.create');



Route::get('logout',[LogoutController::class,'logout'])->name('logout');




// user web
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/profile',[HomeController::class,'profile'])->name('profile');

// product route




 // product view
    // Route::get('product/page ',[ProductPageController::class,'productPage'])->name('product.page');

    Route::get('product/view/{id}',[ProductPageController::class,'productView'])->name('product.view');

    Route::get('/category/{id}/products', [ProductPageController::class, 'categoryByProduct'])->name('category.products');


// add to cart
    Route::post('/cart/add', [CartPageController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/show', [CartPageController::class, 'cartShow'])->name('cart.show');
    Route::delete('/cart/remove/{id}', [CartPageController::class, 'removeFromCart'])->name('cart.remove');


// user login





    // carts


