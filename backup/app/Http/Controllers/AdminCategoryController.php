<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status','>',0)->get();
        return view('admin.modules.category.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.modules.category.create');
    }
    public function save(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->status = 1;
        $category->save();
        return redirect()->route('admin.category.index')->with(['success' => 'Category Deleted Successfully']);
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->status = 0;
        $category->save();
        foreach($category->sub_categories as $sub)
        {
            $sub->status = 0;
            $sub->save();
        }
        $products = Product::where('category_id',$id)->get();
        foreach($products as $product)
        {
            $product->status = 0;
            $product->save();
        }
        return redirect()->back()->with(['success' => 'Category Deleted Successfully']);
    }
    public function status($id)
    {
        $category = Category::findOrFail($id);
        if($category->status == 2)
        {
            $category->status = 1;
            foreach($category->sub_categories as $sub)
            {
                $sub->status = 1;
                $sub->save();
            }
            $products = Product::where('category_id',$id)->get();
            foreach($products as $product)
            {
                $product->status = 1;
                $product->save();
            }
        }

        else
        {
            $category->status = 2;
            foreach($category->sub_categories as $sub)
            {
                $sub->status = 2;
                $sub->save();
            }
            $products = Product::where('category_id',$id)->get();
            foreach($products as $product)
            {
                $product->status = 2;
                $product->save();
            }
        }


        $category->save();

        return redirect()->back()->with(['success' => 'Category Status Changed Successfully']);
    }
}
