<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class UsersProgressExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::whereHas('role', function($query) {
            $query->where('name', 'user');
        })->get()->map(function($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'total_habits' => $user->habits->count(),
                'active_habits' => $user->habits()->wherePivot('is_active', true)->count(),
                'completion_rate' => $this->calculateCompletionRate($user->id),
                'current_streak' => $this->calculateStreak($user->id),
                'joined_date' => $user->created_at->format('Y-m-d')
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Total Habits',
            'Active Habits',
            'Completion Rate (%)',
            'Current Streak',
            'Joined Date'
        ];
    }

    private function calculateCompletionRate($userId)
    {
        // ... same as in UserController
    }

    private function calculateStreak($userId)
    {
        // ... same as in UserController
    }
}