<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
class AdminLeagueController extends Controller
{
    public function index()
    {
        $leagues = League::where('status',1)->get();
        return view('admin.modules.league.index',compact('leagues'));
    }
}
