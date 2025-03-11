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

        return view('pages.admin.productdetail.product_detail_list', compact('productdetails'));
    }
    public function productDetailCreate()
    {
        return view('pages.admin.productDetail.product_detail_create');


    }
    public function productDetailStore(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'brand' => 'required|string|max:255',
                'size' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'material' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            ProductDetail::create([
                'product_id' => $request->product_id,
                'brand' => $request->brand,
                'size' => $request->size,
                'color' => $request->color,
                'material' => $request->material,
                'description' => $request->description,
            ]);
            return redirect()->route('product.detail.list')->with('success', 'Product details created successfully!');

        } catch (\Exception $e) {
            return back()->with('error','Something went wrong');
        }

    }
public function productDetailEdit(Request $request,$id) {

    // $request->validate([
    //     'product_id' => 'required|exists:products,id',
    // ]);

    $productdetails=ProductDetail::with('product')->findOrFail($id);


    return view('pages.admin.productdetail.product_detail_update',compact('productdetails'));

}

public function productDetailUpdate(Request $request, $id)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'brand' => 'required|string|max:255',
        'size' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'material' => 'required|string|max:255',
        'description' => 'required|string|max:255',
    ]);

    $productdetail = ProductDetail::findOrFail($id);
    $productdetail->update($request->all());

    return redirect()->route('product.detail.list')->with('success', 'Product details updated successfully!');

}





    public function productDetailDelete($id)
{
    $productDetail = ProductDetail::findOrFail($id);
    $productDetail->delete();

    return redirect()->route('product.detail.list')->with('success', 'Product details deleted successfully!');
}

}
