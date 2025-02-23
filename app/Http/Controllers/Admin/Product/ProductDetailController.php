<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function productDetailList()
    {
        $productdetails = ProductDetail::with('product.images')->get();

        return view('pages.admin.category.category-list', compact('productdetails'));
    }
    public function productDetailCreate()
    {
       try {
              return view('pages.admin.category.category-list', compact('productdetails'));
       } catch (\Exception $e) {
   return back()->with('error','same problem');
       }


    }
}
