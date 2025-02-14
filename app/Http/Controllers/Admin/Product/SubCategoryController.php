<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
       // sub category create update edit delete
       public function subcategorylist()
       {
           $subcategories = SubCategory::paginate(10);
           return view('pages.admin.category.subcategory-list', compact('subcategories'));
       }
       public function subcategorycreate()   {
           $categories = Category::all();
           return view('pages.admin.category.subcategory-create', compact('categories'));

       }
       public function subcategorystore(Request $request)
       {
           $request->validate([
               'category_id' => 'required',
               'name' => 'required',
           ]);
           $subcategory = new SubCategory();
           $subcategory->category_id = $request->category_id;
           $subcategory->name = $request->name;
           $subcategory->save();
           return redirect()->back()->with(
               'success',
               'Sub Category created successfully'
           );

       }
       public function subcategoryedit( $id)  {
           $subcategory = SubCategory::findOrFail($id);
           $categories = Category::all();
           return view('pages.admin.category.subcategory-update', compact('subcategory', 'categories'));

       }
       public function subcategoryupdate(Request $request, $id)
       {
           $request->validate([
               'category_id' => 'required',
               'name' => 'required',
           ]);
           $subcategory = SubCategory::findOrFail($id);
           $subcategory->category_id = $request->category_id;
           $subcategory->name = $request->name;
           $subcategory->save();
           return redirect()->route('subcategory-list')->with('success', 'Sub Category updated successfully.');
       }
       public function subcategorydelete($id)
       {
           $subcategory = SubCategory::findOrFail($id);
           $subcategory->delete();
           return redirect()->route('subcategory-list')->with('success', 'Sub Category deleted successfully.');
       }
}
