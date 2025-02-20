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

        $products = Product::paginate(10);
        return view('pages.product.product-page',compact(var_name: 'products'));
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


    public function categoryByProduct($id)
    {
        try {
            $category = Category::findOrFail($id);

            $products = Product::where('category_id', $id)
                ->with('images', 'productDetail')
                ->paginate(20);

            return view('pages.product.category_by_product', compact('category', 'products'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Category not found.');
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
