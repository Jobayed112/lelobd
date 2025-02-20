<?php
namespace App\Http\Controllers\Product;

use App\Models\Cart;
use App\Models\Product;
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
            return response()->json(['error' => 'Unauthorized', 'message' => 'User not authenticated'], 401);
        }

        $product = Product::findOrFail($request->product_id);

        $qty = $request->qty;

        if ($qty==18) {
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
        return back()->with('error','Something went wrong');
    }
}

    public function cartShow()
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your cart.');
        }

        $cartItems = Cart::where('user_id', $user_id)->get();

        $tola_carts_price=$cartItems->sum('price');
        return view('pages.user.carts', compact('cartItems','tola_carts_price'));
    }

    public function removeFromCart($id)
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $cart = Cart::where('id', $id)->where('user_id', $user_id)->firstOrFail();
        $cart->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
