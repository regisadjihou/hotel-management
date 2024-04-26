<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
class AdminSubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::where('status','>',0)->get();
        return view('admin.modules.category.sub-categories-index',compact('sub_categories'));
    }
    public function create()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.modules.category.sub-category-create',compact('categories'));
    }
    public function save(Request $request)
    {

        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->title = $request->title;
        $subcategory->status = 1;
        $subcategory->save();
        return redirect()->route('admin.subcategory.index')->with(['success' => 'Subcategory Created Successfully']);
    }
    public function edit($id)
    {
        $categories = Category::where('status',1)->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.modules.category.sub-category-edit',compact('categories','subcategory'));
    }
    public function update(Request $request)
    {
        $subcategory = SubCategory::findOrFail($request->id);
        $subcategory->category_id = $request->category_id;
        $subcategory->title = $request->title;
        $subcategory->save();
        return redirect()->route('admin.subcategory.index')->with(['success' => 'Subcategory Updated Successfully']);
    }
    public function delete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->status = 0;
        $subcategory->save();

        $products = Product::where('sub_category_id',$id)->get();
        foreach($products as $product)
        {
            $product->status = 0;
            $product->save();
        }
        return redirect()->back()->with(['success' => 'Sub Category Deleted Successfully']);
    }
    public function status($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        if($subcategory->status == 2)
        {
            $subcategory->status = 1;

            $products = Product::where('sub_category_id',$id)->get();
            foreach($products as $product)
            {
                $product->status = 1;
                $product->save();
            }
        }

        else
        {
            $subcategory->status = 2;
            $products = Product::where('sub_category_id',$id)->get();
            foreach($products as $product)
            {
                $product->status = 2;
                $product->save();
            }
        }


        $subcategory->save();

        return redirect()->back()->with(['success' => 'Sub Category Status Changed Successfully']);
    }
}
