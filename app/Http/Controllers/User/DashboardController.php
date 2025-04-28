<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use App\Models\HabitProgress;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        
        $habits = auth()->user()->habits()
            ->with(['progress' => function($query) use ($today) {
                $query->whereDate('date', $today);
            }])
            ->get()
            ->map(function($habit) {
                $habit->isCompletedToday = $habit->progress->isNotEmpty();
                return $habit;
            });
    
        // Obtener contadores
        $completedToday = auth()->user()->getCompletedHabitsToday();
        $streakCount = auth()->user()->calculateStreak();
    
        return view('user.dashboard', compact('habits', 'completedToday', 'streakCount'));
    }
}
