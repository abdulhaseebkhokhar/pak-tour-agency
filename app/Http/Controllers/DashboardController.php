<?php

namespace App\Http\Controllers;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\TourController;
class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();  // Fetch all users
        $tours = Tour::all();  // Fetch all tours
    
        return view('dashboard', compact('users', 'tours'));
    }
    
}
