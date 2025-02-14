<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //  product lis heare
    public function productlist()
    {
        try {
            $products = Product::with('category')->paginate(10);
            return view('pages.admin.product.product-list', compact('products'));
        } catch (\Exception $e) {
            return response()->json(
                ['error' => 'Something went wrong',
                'message' => $e->getMessage()
            ],
                500
            );
        }

    }
    public function productCreate()
    {
        try {
            $categories = Category::with('subcategories')->get();
            return view('pages.admin.product.product-create', compact('categories'));
        } catch (\Exception $e) {
            return response()->json(
                ['error' => 'Something went wrong',],
                500
            );
        }
    }
    public function productStore(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required|',
                'name' => 'required|string|max:255|unique:products,name,',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|in:instock,unavailable',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4048', //
            ]);

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->img_url = $request->img_url;
            $product->stock = $request->stock;

            if ($request->hasFile('img_url')) {
                $img_url = $request->file('img_url');
                $img_url_name = time() . '.' . $img_url->getClientOriginalExtension();
                $img_url->move(public_path('uploads/products/'), $img_url_name);

                $product->img_url = 'uploads/products/' . $img_url_name;
            }
            $product->save();
            return redirect()->route('product-list')->with('success', 'Product created successfully.');

        } catch (\Exception $te) {
            return response()->json(
                ['error' => 'Something went wrong',

            ],
                500
            );
        }

    }

    public function productEdit($id)
    {
        try {

            $product = Product::with('category')->findOrFail($id);

            $categories = Category::with('subcategories')->get();
            return view('pages.admin.product.product-update', compact('product','categories'));

        } catch (\Exception $e) {
            return back()->with(
                'error', 'Something went wrong',
            );
        }

    }


    public function productUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|max:255|unique:products,name,' . $id,
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|in:instock,unavailable',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $product = Product::findOrFail($id);
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->stock = $request->stock;

            if ($request->hasFile('img_url')) {
                if ($product->img_url) {
                    unlink(public_path($product->img_url));
                }

                $img_url = $request->file('img_url');
                $img_url_name = time() . '.' . $img_url->getClientOriginalExtension();
                $img_url->move(public_path('uploads/products/'), $img_url_name);

                $product->img_url = 'uploads/products/' . $img_url_name;
            }

            $product->save();
            return redirect()->route('product-list')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return back()->with(
                'error', 'Something went wrong',
            );
        }


    }

    public function productDelete($id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product->img_url) {
                unlink(public_path($product->img_url));
            }
            $product->delete();
            return redirect()->route('product-list')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return back()->with(
                'error', 'Something went wrong',
            );
        }
    }



}
