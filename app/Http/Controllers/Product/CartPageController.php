<?php

namespace App\Http\Controllers\Product;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartPageController extends Controller
{
    public function addToCart(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'color' => 'nullable|string|max:200',
                'size' => 'nullable|string|max:200',
                'qty' => 'nullable|integer|min:1',
                'price' => 'nullable|numeric|min:0',
            ]);

            $user_id = Auth::id() ?? $request->header('user_id');
            if (!$user_id) {
                return back()->with('error', ' Must be login Unauthorized');
            }

            $product = Product::findOrFail($request->product_id);

            $qty = $request->qty;

            if ($qty == 18) {
                return back()->with('error', 'Requested quantity exceeds available stock');
            }


            $price = $product->price;
            $total_price = $qty * $price;


            Cart::updateOrCreate(
                ['user_id' => $user_id, 'product_id' => $product->id],
                ['qty' => $request->qty ?? 1, 'price' => $total_price]
            );

            return back()->with('success', 'Product added to cart successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Login Fast');
        }
    }

    public function cartShow()
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('login.form')->with('error', 'You must be logged in to view your cart.');
        }

        $cartItems = Cart::where('user_id', $user_id)->get();

        $total_carts_price = $cartItems->sum('price');
        return view('pages.product.addToCart.add_to_cart', compact('cartItems', 'total_carts_price'));
    }

    public function removeFromCart($id)
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('login.form')->with('error', 'Unauthorized access.');
        }

        $cart = Cart::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }



    public function ckeckoutPage(Request $request)
    {
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->get();
        $totalPrice = $cartItems->sum('price');

        return view('pages.product.addToCart.Checkout', compact('cartItems', 'totalPrice'));
    }

    public function checkout(Request $request)
    {
        try {
            $user_id = Auth::id() ?? $request->header('user_id');
            if (!$user_id) {
                return redirect()->route('login')->with('error', 'You must be logged in to proceed with checkout.');
            }

            $cartItems = Cart::where('user_id', $user_id)->get();
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty. Please add products to your cart.');
            }

            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item->price;
            }

            $request->validate([
                'shipping_address' => 'required|string|max:255',
                'payment_method' => 'required|string|in:credit_card,paypal,cash_on_delivery',
            ]);

            $order = Order::create([
                'user_id' => $user_id,
                'total_price' => $totalPrice,
                'shipping_address' => $request->shipping_address,
                'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ]);
            }

            Cart::where('user_id', $user_id)->delete();

            return redirect()->route('order.success', ['order' => $order->id])->with('success', 'Checkout successful! Your order is being processed.');
        } catch (\Exception $e) {
            return back()->with('error', 'There was an error processing your order. Please try again later.');
        }
    }
}
