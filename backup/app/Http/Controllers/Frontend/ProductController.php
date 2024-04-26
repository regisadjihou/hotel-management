<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\Category;
use App\Models\LeagueTeam;

class ProductController extends Controller
{
    public function product_list_by_league($id)
    {
        $categories = Category::where('status',1)->where('type',1)->get();
        $products = Product::where('league_id',$id)->where('status',1)->get();
        $league_id = $id;
        return view('frontend.modules.product-list',compact('products','categories','league_id'));
    }
    public function product_list_by_team($id)
    {
        $categories = Category::where('status',1)->where('type',1)->get();
        $products = Product::where('league_team_id',$id)->where('status',1)->get();
        $leagueTeam = LeagueTeam::where('id', $id)->first();
        if ($leagueTeam) {
            $league_id = $leagueTeam->league_id;
        } else {
            $league_id = null;
        }
        $team_id = $id;
        return view('frontend.modules.product-list',compact('products','categories','league_id','team_id'));
    }
    public function product_list_by_country($id)
    {
        $categories = Category::where('status',1)->where('type',1)->get();
        $products = Product::where('country_team_id',$id)->where('status',1)->get();
        return view('frontend.modules.product-list',compact('products','categories'));
    }
    public function product_list_others($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id',$id)->where('status',1)->get();
        return view('frontend.modules.product-list-others',compact('products','category'));
    }
    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        $related_products = Product::where('id', '!=', $id)
        ->where('league_id',$product->league_id)
        ->where('league_team_id',$product->league_team_id)
        ->limit(6) // Adjust as needed
        ->get();
        return view('frontend.modules.product-details',compact('product','related_products'));
    }
    public function product_filter(Request $request)
    {
        $league_id = $request->league_id;
        $category = $request->category;
        $sub_category = $request->sub_category;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $query = Product::query();

        if($league_id)
        {
            $query->where('league_id', $league_id);
        }
        if($sub_category)
        {
            if ($sub_category !== 'all') {
                $query->where('sub_category_id', $sub_category);
            }
            else
            {
                $query->where('category_id', $category);
            }
        }
        if ($min_price !== null && $max_price !== null) {
            $query->whereBetween('price', [$min_price, $max_price]);
        }

        $sortBy = $request->sortBy;
        switch ($sortBy) {
            case 'name-asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('title', 'desc');
                break;
            case 'price-low-high':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high-low':
                $query->orderBy('price', 'desc');
                break;
            default:
                // Default sorting logic
                break;
        }

        // $productsQuery = $query->toSql();
        // $productsBindings = $query->getBindings();

        // dd($productsQuery, $productsBindings);
        $products = $query->get();
        $count = count($products);

        // Render the Blade view and return the HTML
        $products = View::make('frontend.snippets.product-list', compact('products'))->render();

        return response()->json(['products' => $products,'count' => $count]);
    }
    public function product_filter_others(Request $request)
    {
        $category = $request->category;
        $sub_category = $request->sub_category;
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $query = Product::query();
        if($category)
        {
            $query->where('category_id', $category);
        }
        if($sub_category)
        {
            if ($sub_category !== 'all') {
                $query->where('sub_category_id', $sub_category);
            }
            else
            {
                $query->where('category_id', $category);
            }
        }
        if ($min_price !== null && $max_price !== null) {
            $query->whereBetween('price', [$min_price, $max_price]);
        }

        $sortBy = $request->sortBy;
        switch ($sortBy) {
            case 'name-asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('title', 'desc');
                break;
            case 'price-low-high':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high-low':
                $query->orderBy('price', 'desc');
                break;
            default:
                // Default sorting logic
                break;
        }

        // $productsQuery = $query->toSql();
        // $productsBindings = $query->getBindings();

        // dd($productsQuery, $productsBindings);
        $products = $query->get();
        $count = count($products);

        // Render the Blade view and return the HTML
        $products = View::make('frontend.snippets.product-list', compact('products'))->render();

        return response()->json(['products' => $products,'count' => $count]);
    }


}
