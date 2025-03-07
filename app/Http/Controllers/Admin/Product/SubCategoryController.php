<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    // sub category create update edit delete
    public function subCategoryList()
    {
        $subcategories = SubCategory::with('category')->paginate(10);
        return view('pages.admin.subcategory.subcategory-list', compact('subcategories'));
    }
    public function subcategorycreate()
    {
        $categories = Category::all();
        return view('pages.admin.subcategory.subcategory-create', compact('categories'));
    }
    public function subcategorystore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
            ]);

            $subcategory = new SubCategory();
            $subcategory->name = $request->name;
            $subcategory->category_id = $request->category_id;

            if ($request->hasFile('img_url')) {
                $image = $request->file('img_url');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/subcategories'), $imageName);
                $subcategory->img_url = 'uploads/subcategories/' . $imageName;
            }

            $subcategory->save();

            return redirect()->route('subcategory-list')->with('success', 'Sub-Category created successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }
    public function subcategoryedit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('pages.admin.subcategory.subcategory-update', compact('subcategory', 'categories'));
    }
    public function subCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144',
        ]);
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;


        if ($request->hasFile('img_url')) {
            if ($subcategory->img_url && file_exists(public_path($subcategory->img_url))) {
                unlink(public_path($subcategory->img_url));
            }

            $image = $request->file('img_url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/categories/'), $imageName);

            $subcategory->img_url = 'uploads/categories/' . $imageName;
        }


        $subcategory->save();
        return redirect()->route('subcategory-list')->with('success', 'Sub Category updated successfully.');
    }





    public function subcategorydelete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        // if ($subcategory->category()->exists()) {

        //     return redirect()->route('subcategory-list')->with('error', 'Subcategories  Has Related Category Not Deleted.');
        // }

        if (file_exists(public_path($subcategory->img_url))) {
            unlink(public_path($subcategory->img_url));
        }

        $subcategory->delete();
        return redirect()->route('subcategory-list')->with('success', 'Sub Category deleted successfully.');
    }
}
