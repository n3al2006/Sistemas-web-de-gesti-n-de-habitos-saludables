<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\HabitProgress;
use App\Exports\UsersProgressExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class UserController extends Controller
{
    public function progress()
    {
        $users = User::with(['habits', 'habitProgress'])
            ->whereHas('role', function($query) {
                $query->where('name', 'user');
            })
            ->get();

        $userProgress = $users->map(function($user) {
            return [
                'user' => $user,
                'total_habits' => $user->habits->count(),
                'completed_today' => $user->habitProgress()
                    ->whereDate('date', Carbon::today())
                    ->where('completed', true)
                    ->count(),
                'streak' => $this->calculateStreak($user->id),
                'completion_rate' => $this->calculateCompletionRate($user->id)
            ];
        });

        return view('admin.users.progress', compact('userProgress'));
    }

    public function export()
    {
        return Excel::download(new UsersProgressExport, 'users-progress.xlsx');
    }

    private function calculateStreak($userId)
    {
        $streak = 0;
        $date = Carbon::today();

        while (true) {
            $hasProgress = HabitProgress::where('user_id', $userId)
                ->whereDate('date', $date)
                ->where('completed', true)
                ->exists();

            if (!$hasProgress) break;
            
            $streak++;
            $date = $date->subDay();
        }

        return $streak;
    }

    private function calculateCompletionRate($userId)
    {
        $lastMonth = Carbon::now()->subMonth();
        
        $total = HabitProgress::where('user_id', $userId)
            ->where('created_at', '>=', $lastMonth)
            ->count();

        $completed = HabitProgress::where('user_id', $userId)
            ->where('created_at', '>=', $lastMonth)
            ->where('completed', true)
            ->count();

        return $total > 0 ? round(($completed / $total) * 100) : 0;
    }
}
