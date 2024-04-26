<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryTeam;
class AdminCountryTeamController extends Controller
{
    public function index()
    {
        $teams = CountryTeam::where('status',1)->get();
        return view('admin.modules.country.team-index',compact('teams'));
    }
}
