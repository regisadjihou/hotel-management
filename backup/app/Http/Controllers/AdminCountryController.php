<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
class AdminCountryController extends Controller
{
    public function index()
    {
        $countries = Country::where('status',1)->get();
        return view('admin.modules.country.index',compact('countries'));
    }
}
