<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();
        return view('frontend.modules.home', compact('products'));
    }
    public function contact_us()
    {
        return view('frontend.modules.contact-us');
    }
    public function about_us()
    {
        return view('frontend.modules.about-us');
    }
    public function login_page()
    {
        return view('frontend.modules.login');
    }
    public function register_page()
    {
        return view('frontend.modules.register');
    }
    public function account()
    {
        return view('frontend.modules.account');
    }


}
