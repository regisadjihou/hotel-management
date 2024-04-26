<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Models\League;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\LeagueTeam;
use App\Models\Country;
use App\Models\CountryTeam;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductCustom;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::whereHas('category', function ($query) {
            $query->where('type', 1);
        })->get();
        return view('admin.modules.product.index',compact('products'));
    }
    public function create()
    {
        $leagues = League::where('status', 1)->get();
        $categories = Category::where('status', 1)->where('type',1)->get();
        $teams = LeagueTeam::where('status',1)->get();
        $sub_categories = SubCategory::where('status',1)->get();
        $countries = Country::where('status',1)->get();
        $country_teams = CountryTeam::where('status',1)->get();
        return View::make('admin.modules.product.create', compact('leagues', 'categories','sub_categories','teams','countries','country_teams'));
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $leagues = League::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $teams = LeagueTeam::where('status',1)->get();
        $sub_categories = SubCategory::where('status',1)->get();
        $countries = Country::where('status',1)->get();
        $country_teams = CountryTeam::where('status',1)->get();
        return View::make('admin.modules.product.edit', compact('product','leagues', 'categories','sub_categories','teams','countries','country_teams'));
    }
    public function save(Request $request)
    {
       // dd($request);
        $product = new product();
        $product->category_id = $request['productCategory'];
        $product->sub_category_id = $request['productSubCategory'];
        if($request['leagueOrCountry'])
        {
            if($request['leagueOrCountry'] == 'league')
            {
                $product->is_league_team = 1;
                $product->league_id = $request['league'];
                $product->league_team_id = $request['team'];
            }
            else
            {
                $product->is_country_team = 1;
                $product->country_id = $request['country'];
                $product->country_team_id = $request['countryTeam'];
            }
        }


        $product->title = $request['productName'];
        $product->price = $request['productPrice'];
        $product->discount = 0;
        $product->description = $request['productDescription'];
        $product->status = 1;

         // Handle main image upload
       if ($request->hasFile('mainImage')) {
            $mainImage = $request->file('mainImage');
            $mainImageName = 'main_' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImagePath = 'product_images/' . $mainImageName; // Change the folder structure as needed
            $mainImage->move(public_path('product_images'), $mainImageName);
            $product->main_image = $mainImageName;
        }

        $product->save();

        $multipleImagesPaths = [];
        if ($request->hasFile('multipleImages')) {
            foreach ($request->file('multipleImages') as $key => $image) {
                $imageName = 'multiple_' . time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                $imagePath = 'product_images/' . $imageName; // Change the folder structure as needed
                $image->move(public_path('product_images'), $imageName);
                $multipleImagesNames[] = $imageName;
            }
            foreach($multipleImagesNames as $name)
            {
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image =$name;
                $product_image->save();
            }
        }

        $productSizes = $request->input('productSize');
        $sizesArray = explode(',', $productSizes);

        foreach ($sizesArray as $size) {
            $productSize = new ProductSize();
            $productSize->product_id = $product->id;
            $productSize->size = trim($size);
            $productSize->save();
        }

        $productCustomItems = $request->input('productCustomItems');
        $customItemsArray = explode(',', $productCustomItems);

        foreach ($customItemsArray as $customItem) {
            $productCustom = new ProductCustom();
            $productCustom->product_id = $product->id;
            $productCustom->custom_title = trim($customItem); // Trim spaces around each custom item
            $productCustom->save();
        }
        //return redirect()->route('admin.product.index')->with(['success' => 'Product Created Successfully']);
        return redirect()->back()->with(['success' => 'Product Created Successfully']);

    }
    public function update(Request $request)
    {
       // dd($request);
        $product = product::findOrFail($request->product_id);
        $product->category_id = $request['productCategory'];
        $product->sub_category_id = $request['productSubCategory'];
        if($request['leagueOrCountry'])
        {
            if($request['leagueOrCountry'] == 'league')
            {
                $product->is_league_team = 1;
                $product->league_id = $request['league'];
                $product->league_team_id = $request['team'];
            }
            else
            {
                $product->is_country_team = 1;
                $product->country_id = $request['country'];
                $product->country_team_id = $request['countryTeam'];
            }
        }


        $product->title = $request['productName'];
        $product->price = $request['productPrice'];
        $product->discount = 0;
        $product->description = $request['productDescription'];
        $product->status = 1;

         // Handle main image upload
        if ($request->hasFile('mainImage')) {
            $mainImage = $request->file('mainImage');
            $mainImageName = 'main_' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImagePath = 'product_images/' . $mainImageName; // Change the folder structure as needed
           $mainImage->move(public_path('product_images'), $mainImageName);
            $product->main_image = $mainImageName;
        }
        $product->save();

        $multipleImagesPaths = [];
        if ($request->hasFile('multipleImages')) {
            foreach ($request->file('multipleImages') as $key => $image) {
                $imageName = 'multiple_' . time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                $imagePath = 'product_images/' . $imageName; // Change the folder structure as needed
                $image->move(public_path('product_images'), $imageName);
                $multipleImagesNames[] = $imageName;
            }
            foreach($multipleImagesNames as $name)
            {
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $product_image->image =$name;
                $product_image->save();
            }
        }



        // Fetch existing sizes and custom items associated with the product
        $existingSizes = $product->sizes()->pluck('size')->toArray();
        $existingCustomItems = $product->customs()->pluck('custom_title')->toArray();

        // Get the new values from the request
        $newSizes = explode(',', $request->input('productSize'));
        $newCustomItems = explode(',', $request->input('productCustomItems'));

        // Delete sizes that are not in the new values
        $deletedSizes = array_diff($existingSizes, $newSizes);
        foreach ($deletedSizes as $deletedSize) {
            $product->sizes()->where('size', $deletedSize)->delete();
        }

        // Delete custom items that are not in the new values
        $deletedCustomItems = array_diff($existingCustomItems, $newCustomItems);
        foreach ($deletedCustomItems as $deletedCustomItem) {
            $product->customs()->where('custom_title', $deletedCustomItem)->delete();
        }

        // Add new sizes
        foreach ($newSizes as $size) {
            $product->sizes()->firstOrCreate(['size' => trim($size)]);
        }

        // Add new custom items
        foreach ($newCustomItems as $customItem) {
            $product->customs()->firstOrCreate(['custom_title' => trim($customItem)]);
        }

        return redirect()->route('admin.product.index')->with(['success' => 'Product Updated Successfully']);

    }
    public function get_league_teams(Request $request)
    {
        $leagueId = $request->get('league_id');

        // Fetch league teams based on the selected league
        $teams = LeagueTeam::where('league_id', $leagueId)->where('status',1)->pluck('name', 'id');

        return response()->json(['teams' => $teams]);
    }
    public function get_country_teams(Request $request)
    {
        
        $countryId = $request->get('country_id');

        // Fetch league teams based on the selected league
        $teams = CountryTeam::where('country_id', $countryId)->where('status',1)->pluck('name', 'id');

        return response()->json(['teams' => $teams]);
    }
    public function get_category_sub_categories(Request $request)
    {
        $categoryId = $request->get('category_id');

        // Fetch league teams based on the selected league
        $sub_categories = SubCategory::where('category_id', $categoryId)->where('status',1)->pluck('title', 'id');

        return response()->json(['sub_categories' => $sub_categories]);
    }
    public function image_delete(Request $request)
    {
        $productId = $request->input('productId');

        // Get the product by ID
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found.'], 404);
        }

        // Delete the image from storage
        $imagePath = 'product_images/' . $product->main_image;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Update the product in the database
        $product->main_image = null;
        $product->save();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
    public function image_multiple_delete(Request $request)
    {
        $imageId = $request->input('imageId');

        // Get the product by ID
        $image = ProductImage::find($imageId);

        if (!$image) {
            return response()->json(['message' => 'Image not found.'], 404);
        }

        // Delete the image from storage
        $imagePath = 'product_images/' . $image->image;

        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Update the image in the database
        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
