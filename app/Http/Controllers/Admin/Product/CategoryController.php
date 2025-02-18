<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function categoryList()
    {
        $categories = Category::with('subcategories')->paginate(10);
        return view('pages.admin.category.category-list', compact('categories',));
    }

    public function categoryCreate()
    {
        return view('pages.admin.category.category-create');
    }
    public function categoryStore(Request $request)
{
    try {
        $request->validate([
            'name' => 'required',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('img_url')) {
            $image = $request->file('img_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories/'), $imageName);
            $category->img_url = 'uploads/categories/' . $imageName;
        }

        $category->save();

        return redirect()->route('category-list')->with(
            'success',
            'Category created successfully'
        );
    } catch (\Exception $e) {
        return back()->with('error', 'Something went wrong');
    }
}

    public function categoryEdit($id)
    {
        try {
            $category = Category::with('subcategories')->findOrFail($id);
            $subcategories = SubCategory::all();
            return view('pages.admin.category.category-update', compact('category', 'subcategories'));

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }

    }

    public function categoryUpdate(Request $request , $id)  {

        try {
            $request->validate([
                'name' => 'required',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            ]);
            $category = Category::findOrFail($id);
            $category->name = $request->name;

            if ($request->hasFile('img_url')) {
                $image = $request->file('img_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/category/'), $imageName);

                $category->update([
                    'img_url' => 'uploads/category/' . $imageName,
                ]);
            }

            $category->save();
            return redirect()->route('category-list')->with('success', 'Product updated successfully.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }


    }
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category-list')->with('success', 'Category deleted successfully.');
    }


}
