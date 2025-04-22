<?php

namespace App\Services;

use App\Models\User;
use App\Models\Habit;
use App\Models\HabitProgress;
use Carbon\Carbon;

class HabitStatisticsService
{
    public function getUserStatistics(User $user, $days = 30)
    {
        $startDate = Carbon::now()->subDays($days);
        
        $progress = HabitProgress::where('user_id', $user->id)
            ->where('created_at', '>=', $startDate)
            ->get()
            ->groupBy(function($item) {
                return $item->created_at->format('Y-m-d');
            });

        $labels = [];
        $completionData = [];
        
        for ($i = $days; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $labels[] = $date;
            
            if (isset($progress[$date])) {
                $total = $progress[$date]->count();
                $completed = $progress[$date]->where('completed', true)->count();
                $completionData[] = $total > 0 ? round(($completed / $total) * 100) : 0;
            } else {
                $completionData[] = 0;
            }
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Completion Rate (%)',
                    'data' => $completionData,
                    'borderColor' => '#3B82F6',
                    'tension' => 0.1
                ]
            ]
        ];
    }

    public function getOverallStatistics()
    {
        return [
            'total_users' => User::count(),
            'active_today' => HabitProgress::whereDate('created_at', Carbon::today())->distinct('user_id')->count(),
            'total_habits' => Habit::count(),
            'avg_completion_rate' => $this->calculateAverageCompletionRate()
        ];
    }

    private function calculateAverageCompletionRate()
    {
        $lastMonth = Carbon::now()->subMonth();
        
        $totalProgress = HabitProgress::where('created_at', '>=', $lastMonth)->count();
        $completedProgress = HabitProgress::where('created_at', '>=', $lastMonth)
            ->where('completed', true)
            ->count();

        return $totalProgress > 0 ? round(($completedProgress / $totalProgress) * 100) : 0;
    }
}