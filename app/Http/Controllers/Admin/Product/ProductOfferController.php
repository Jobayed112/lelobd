<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductOfferController extends Controller
{
    public function offerList()
    {
        $offerList = ProductOffer::whereNotNull('product_id')->get();

        if ($offerList->isEmpty()) {
            return back()->with('error', 'Product Not Offer');
        }

        return view('pages.admin.offerProduct.offer_product_list', compact('offerList'));
    }

    public function offerCreate()
    {

        $products = Product::all();
        return view('pages.admin.offerProduct.offer_product_create', compact('products'));
    }

       public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'offer_name' => 'required|string|max:100',
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        ProductOffer::create([
            'product_id' => $request->product_id,
            'offer_name' => $request->offer_name,
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('offer.list')->with('success', 'Product offer created successfully!');
    }

    // Show the form for editing the specified product offer
    public function offerEdit($id)
    {
        $offer = ProductOffer::findOrFail($id);
        $products = Product::where('id',$offer->id)->get();
        return view('pages.admin.offerProduct.offer_product_update', compact('offer', 'products'));
    }

    // Update the specified product offer in storage
    public function offerUpdate(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'offer_name' => 'required|string|max:100',
            'discount' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $offer = ProductOffer::findOrFail($id);

        $offer->update([
            'product_id' => $request->product_id,
            'offer_name' => $request->offer_name,
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status ?? 'active',
        ]);

        return redirect()->route('offer.list')->with('success', 'Product offer updated successfully!');
    }

    public function destroy($id)
    {
        $offer = ProductOffer::findOrFail($id);
        $offer->delete();

        return redirect()->route('product_offers.index')->with('success', 'Product offer deleted successfully!');
    }
}
