<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.modules.dashboard.dashboard');
    }
    public function user_dashboard()
    {
        return view('admin.modules.dashboard.user-dashboard');
    }


}
