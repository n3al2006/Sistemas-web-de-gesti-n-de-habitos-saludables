<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use App\Models\HabitProgress;
use Carbon\Carbon;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        $habits = auth()->user()->habits()->with('progress')->get();
        $notifications = Notification::where('user_id', auth()->id())
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Calcular la racha (streak)
        $streakCount = 0;
        $currentDate = Carbon::now()->startOfDay();
        $checkDate = clone $currentDate;
    
        while (true) {
            $hasProgress = HabitProgress::where('user_id', auth()->id())
                ->whereDate('date', $checkDate)
                ->where('completed', true)
                ->exists();
    
            if (!$hasProgress) {
                break;
            }
    
            $streakCount++;
            $checkDate->subDay();
        }
    
        // Calcular hábitos completados hoy
        $completedToday = HabitProgress::where('user_id', auth()->id())
            ->whereDate('date', today())
            ->where('completed', true)
            ->count();
    
        return view('user.dashboard', compact('habits', 'notifications', 'streakCount', 'completedToday'));
    }
}
