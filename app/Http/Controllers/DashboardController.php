<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = Auth::user();
        return view('dashboards.admin', compact('user'));
    }

    public function developer()
    {
        $user = Auth::user();
        return view('dashboards.developer', compact('user'));
    }

    public function viewer()
    {
        $user = Auth::user();
        return view('dashboards.viewer', compact('user'));
    }
}