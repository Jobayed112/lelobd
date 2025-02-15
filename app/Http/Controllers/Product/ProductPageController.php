<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductPageController extends Controller
{

    public function productPage()
    {

        return view('pages.product.product-page');
    }

    public function productView($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('pages.product.product-view',compact('product'));
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


    public function femaleproduct()
    {
        try {
            $maleCategory = Category::where('name', 'Female')->first();

            if (!$maleCategory) {
                return response()->json(['error' => 'Female category not found'], 404);
            }

            $products = Product::where('category_id', $maleCategory->id)->paginate(10);

            return view('pages.product.product-page', compact('products'));

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
            ], 500);
        }
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
}
