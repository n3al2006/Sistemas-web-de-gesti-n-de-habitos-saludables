<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserHabit;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::with(['habits', 'progress'])->get();
        
        // Calcular el progreso mensual para cada usuario
        $users->each(function($user) {
            $user->monthly_progress = $user->progress()
                ->whereMonth('date', now()->month)
                ->where('completed', true)
                ->count();
        });
        
        // Obtener top usuarios
        $topUsers = $users->sortByDesc('monthly_progress')->take(5);
        
        return view('admin.users.index', compact('users', 'topUsers'));
    }

    public function show(User $user)
    {
        $habits = $user->habits()->with('progress')->get();
        $adoptedHabits = UserHabit::where('user_id', $user->id)
            ->where('habit_template_id', '!=', null)
            ->get();
        
        $allHabits = $habits->concat($adoptedHabits);
        
        $monthlyProgress = $user->progress()
            ->whereMonth('date', now()->month)
            ->count();
            
        return view('admin.users.show', compact('user', 'allHabits', 'monthlyProgress'));
    }
}
