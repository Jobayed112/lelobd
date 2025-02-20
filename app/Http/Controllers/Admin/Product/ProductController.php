<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Cart;
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
            return back()->with(
                'error',
                'Something went wrong'
            );
        }
    }
    public function productCreate()
    {
        try {
            $categories = Category::with('subcategories')->get();
            return view('pages.admin.product.product-create', compact('categories'));
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Something went wrong'
            );
        }
    }
    public function productStore(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'required|exists:sub_categories,id',
                'name' => 'required|string|max:255|unique:products,name',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'type' => 'required|in:popular,new,top,special',
                'stock' => 'required|in:instock,unavailable',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            ]);

            $product = Product::create([
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'type' => $request->type,
                'stock' => $request->stock,
            ]);

            if ($request->hasFile('img_url')) {
                $image = $request->file('img_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/products/'), $imageName);

                $product->images()->create([
                    'img_url' => 'uploads/products/' . $imageName,
                ]);
            }

            return redirect()->route('product-list')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return back()->with(
                'error',
                'Something went wrong',
            );
        }
    }

    public function productEdit($id)
    {
        try {
            $product = Product::with('category', 'subCategory')->findOrFail($id);
            $categories = Category::with('subcategories')->get();

            return view('pages.admin.product.product-update', compact('product', 'categories'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }


    public function productUpdate(Request $request, $id)
    {
        try {

            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'required|exists:sub_categories,id',
                'name' => 'required|string|max:255|unique:products,name,' . $id,
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:1',
                'price' => 'required|numeric|min:0',
                'type' => 'required|in:popular,new,top,special',
                'stock' => 'required|in:instock,unavailable',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            ]);

            $product = Product::findOrFail($id);

            $product->update([
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'name' => $request->name,
                'description' => $request->description,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'type' => $request->type,
                'stock' => $request->stock,
            ]);

            if ($request->hasFile('img_url')) {
                $image = $request->file('img_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/products/'), $imageName);

                $product->images()->updateOrCreate([
                    'img_url' => 'uploads/products/' . $imageName,
                ]);
            }

            return redirect()->route('product-list')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }


    public function productDelete($id)
    {
        try {
            $product = Product::findOrFail($id);
            $cat = Cart::where('product_id', $product->id)->get();
            if ($cat->isNotEmpty()) {
                return back()->with('error', 'Product is being used in the cart.');
            }
            foreach ($product->images as $image) {
                $imagePath = public_path($image->img_url);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $product->images()->delete();
            $product->delete();

            return redirect()->route('product-list')->with('success', 'Product and its images deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }




    // exclusive product
    public function productNewList()
    {
        try {
            $newProducts = Product::where('type', 'new')->get();
            return view('pages.admin.product.new-product-list', compact('newProducts'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function editNewProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('pages.admin.product.new-product-update', compact('product'));
        } catch (\Exception $e) {
            return back()->with('error', 'Product not found');
        }
    }


    public function updateNewProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string|in:new,old',
        ]);

        try {
            $product = Product::findOrFail($id);
            $product->update($request->only('name', 'price', 'type'));
            return redirect()->route('product.new.list')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update product');
        }
    }



    public function productPopularList()
    {
        try {
            $PopularProducts = Product::where('type', 'popular')->get();
            return view('pages.admin.product.popular-product-list', compact('PopularProducts'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function productTopList()
    {
        try {
            $TopProducts = Product::where('type', 'top')->get();
            return view('pages.admin.product.top-product-list', compact('TopProducts'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function productSpecialList()
    {
        try {
            $SpecialProducts = Product::where('type', 'special')->get();
            return view('pages.admin.product.special-product-list', compact('SpecialProducts'));
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
}

