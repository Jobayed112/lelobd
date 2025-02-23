<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductOffer;
use App\Models\SubCategory;

class ProductPageController extends Controller
{

    public function productPage()
    {

        $products = Product::paginate(10);
        return view('pages.product.product-page', compact(var_name: 'products'));
    }

    public function productView($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('pages.product.product-view', compact('product'));
    }




    public function ProductBuy()
    {
        return view('pages.product.product_buy');
    }
    public function ProductCartView()
    {
        return view('pages.product-page.product_cart_view');
    }

    public function ProductOrderList()
    {
        return view('pages.product-page.product_order_list');
    }
    public function ProductOrderDetails()
    {
        return view('pages.product-page.product_order_details');
    }


    public function categoryByProduct($name)
    {
        $category = Category::where('name', $name)->with('products')->firstOrFail();
        $categoryByProduct = $category->products;

        return view('pages.product.category_by_product', compact('category', 'categoryByProduct'));
    }



    public function showSubcategoryProducts($name)
    {
        $subcategory = SubCategory::where('name', $name)->with('products', 'category')->first();

        if (!$subcategory) {
            return abort(404, 'Subcategory not found');
        }
        $showSubcategoryProducts = $subcategory->products;
        return view('pages.product.subcategory_by_product', compact('showSubcategoryProducts','subcategory'));
    }






    public function maleproduct()
    {
        try {
            $maleCategory = Category::where('name', 'Male')->first();

            if (!$maleCategory) {
                return response()->json(['error' => 'Male category not found'], 404);
            }

            $products = Product::where('category_id', $maleCategory->id)->paginate(10);

            return view('pages.product.product-page', compact('products'));
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
            ], 500);
        }
    }


    // offer show
    public function offerProduct()  {
        $offerprodusts=ProductOffer::with('product')->get();

        return view('pages.home',compact('offerprodusts'));

    }



}
