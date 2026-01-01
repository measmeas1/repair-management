<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activeStaff = User::where('status', 'active')->count();

        $totalCustomer = Customer::count();

        $newCustomers = Customer::latest()->take(3)->get();

        
        return view('pages.dashboard', compact(
            'activeStaff', 
            'totalCustomer',
            'newCustomers',
        ));
    }
}
