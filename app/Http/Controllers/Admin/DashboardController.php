<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Habit;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalHabits = Habit::count();
        $activeHabits = Habit::whereHas('users', function($query) {
            $query->where('is_active', true);
        })->count();

        return view('admin.dashboard', compact('totalUsers', 'totalHabits', 'activeHabits'));
    }
}
