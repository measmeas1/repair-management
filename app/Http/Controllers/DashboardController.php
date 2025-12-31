<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activeStaff = User::where('status', 'active')->count();
        
        return view('pages.dashboard', compact('activeStaff'));
    }
}
