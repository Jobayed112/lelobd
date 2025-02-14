<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
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
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category-list')->with(
            'success',
            'Category created successfully'
        );
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        return view('pages.admin.category.category-update', compact('category', 'products'));
    }
    public function categoryUpdate(Request $request , $id)  {
        $request->validate([
            'name' => 'required',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;

        $category->save();
        return redirect()->route('category-list')->with('success', 'Product updated successfully.');

    }
    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category-list')->with('success', 'Category deleted successfully.');
    }


}
