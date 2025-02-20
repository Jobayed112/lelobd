<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $categories = Category::with('subcategories')->get();
            $products = Product::with('images')->paginate(20);
            $cartItems=Cart::get();

            $productDetail=ProductDetail::first();

            $view->with([
                'categories' => $categories,
                'products' => $products,
                'cartItems'=> $cartItems,
                'productDetail'=>$productDetail

            ]);
        });
    }
}
