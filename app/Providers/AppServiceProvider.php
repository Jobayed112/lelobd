<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductOffer;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
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
            $productDetail=ProductDetail::with('product')->first();
            $productOffers = Product::with([ 'offers'])->get();
            $view->with([
                'categories' => $categories,
                'products' => $products,
                'productDetail'=>$productDetail,
                'productOffers'=>$productOffers,
            ]);
        });
    }
}
