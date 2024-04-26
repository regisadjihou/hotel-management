<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeagueTeam;
class AdminLeagueTeamController extends Controller
{
    public function index()
    {
        $teams = LeagueTeam::where('status',1)->get();
        return view('admin.modules.league.team-index',compact('teams'));
    }
}
