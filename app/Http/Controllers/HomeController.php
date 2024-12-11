<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $totalAffiliates = Affiliate::count();
        $totalCommissions = AffiliateCommission::count();
        $totalUsers = User::count();

    
        return view('home', compact('totalAffiliates', 'totalCommissions', 'totalUsers'));
    }
}
