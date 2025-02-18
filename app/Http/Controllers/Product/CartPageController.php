<?php

namespace App\Http\Controllers\Product;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartPageController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'nullable|string|max:200',
            'size' => 'nullable|string|max:200',
            'qty' => 'nullable|integer|min:1',
            'price' => 'nullable|numeric|min:0',
        ]);

        $product = Product::findOrFail($request->product_id);
        $user_id=$request->header('user_id');

        Cart::updateOrCreate([
            'user_id' =>$user_id,
            'product_id' => $product->id,
            'qty' => $product->quantity,
            'price' => $product->price,
        ]);

        return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
    }

    public function cartShow()
    {
        $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())->get();

        return view('pages.user.carts', compact('cartItems'));
    }

    public function remove($id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
