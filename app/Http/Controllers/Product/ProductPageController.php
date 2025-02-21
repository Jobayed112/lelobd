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


    public function categoryByProduct($category_name)
    {
        $category = Category::where('name', $category_name)->with('subcategories')->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        $subcategoryIds = $category->subcategories->pluck('id');

        $products = Product::where('category_id', $category->id)
            ->orWhereIn('sub_category_id', $subcategoryIds)
            ->with('images', 'category', 'subCategory')
            ->get();

        return view('pages.product.category_by_product', compact('products', 'category'));
    }


    public function showSubcategoryProducts($name)
    {

        $subcategory = SubCategory::where('name', $name)->firstOrFail();

        $products = Product::where('sub_category_id', $subcategory->id)->get();

        return view('pages.product.subcategory_by_product', compact('subcategory', 'products'));
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
