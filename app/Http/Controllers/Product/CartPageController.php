<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartPageController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "img_url" => $product->images->first()->img_url ?? 'images/no-image.png',
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart-show')->with('success', 'Product added to cart!');
    }

    public function cartShow()
    {
        $cart = session('cart', []);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return view('pages.user.carts', compact('cart', 'totalPrice'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->route('cart-show')->with('success', 'Product removed from cart!');
        }

        return redirect()->route('cart-show')->with('error', 'Product not found in the cart.');
    }
}
