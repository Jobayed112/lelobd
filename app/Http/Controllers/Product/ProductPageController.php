<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductOffer;
use App\Models\SubCategory;
use Psy\Command\WhereamiCommand;

class ProductPageController extends Controller
{

    public function productPage()
    {

        $products = Product::paginate(10);
        return view('pages.product.product-page', compact(var_name: 'products'));
    }

    public function productView(Request $request ,$id)
    {

        try {

            $productView = Product::with(['category', 'productDetail'])->findOrFail($id);
            $productDetail=$productView->productDetail;


            return view('pages.product.product-view', compact('productView','productDetail'));
        } catch (\Exception $e) {
            return back()->with('error','Login Fast Than Cart');
        }

    }





    public function categoryByProduct($name)
    {
        $category = Category::where('name', $name)->with('products')->firstOrFail();
        $categoryByProduct = $category->products;

        return view('pages.product.category_by_product', compact('category', 'categoryByProduct'));
    }



    public function showSubcategoryProducts($id)
    {

        $subcategory = SubCategory::where('id', $id)->with('products' ,'category')->firstOrFail();
        if (!$subcategory) {
            return back()->with('error', 'Subcategory not found');
        }
        $showSubcategoryProducts = $subcategory->products;
        return view('pages.product.subcategory_by_product', compact('showSubcategoryProducts','subcategory'));
    }



    public function offerProduct() {
        $productOffers = ProductOffer::with('product.images')->get();

        $productIds = $productOffers->pluck('product_id')->unique();

        $products = Product::whereIn('id', $productIds)->with('offers', 'images')->get();

        return view('pages.product.offer_product', compact('productOffers', 'products'));
    }




}
