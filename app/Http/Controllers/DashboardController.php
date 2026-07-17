<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProperties = Property::count();
        $pendingReview = Property::where('status', 'pending_review')->count();
        $published = Property::where('status', 'published')->count();
        $totalUsers = User::count();
        $recentProperties = Property::latest()->take(5)->get();

        return view('dashboard', [
            'totalProperties' => $totalProperties,
            'pendingReview' => $pendingReview,
            'published' => $published,
            'totalUsers' => $totalUsers,
            'recentProperties' => $recentProperties,
        ]);
    }
}