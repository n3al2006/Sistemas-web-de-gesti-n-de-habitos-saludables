<?php

namespace App\Services;

use App\Models\User;
use App\Models\Achievement;
use App\Models\HabitProgress;
use Carbon\Carbon;
use App\Notifications\AchievementUnlocked;

class AchievementService
{
    public function checkAndAwardAchievements(User $user)
    {
        $this->checkStreakAchievements($user);
        $this->checkCompletionAchievements($user);
        $this->checkDiversityAchievements($user);
    }

    private function checkStreakAchievements(User $user)
    {
        $streak = $this->calculateCurrentStreak($user);
        $streakAchievements = Achievement::where('type', 'streak')->get();

        foreach ($streakAchievements as $achievement) {
            if ($streak >= $achievement->required_count && !$user->hasAchievement($achievement->id)) {
                $this->awardAchievement($user, $achievement);
            }
        }
    }

    private function checkCompletionAchievements(User $user)
    {
        $totalCompleted = HabitProgress::where('user_id', $user->id)
            ->where('completed', true)
            ->count();

        $completionAchievements = Achievement::where('type', 'completion')->get();

        foreach ($completionAchievements as $achievement) {
            if ($totalCompleted >= $achievement->required_count && !$user->hasAchievement($achievement->id)) {
                $this->awardAchievement($user, $achievement);
            }
        }
    }

    private function checkDiversityAchievements(User $user)
    {
        $uniqueHabits = $user->habits()->count();
        $diversityAchievements = Achievement::where('type', 'diversity')->get();

        foreach ($diversityAchievements as $achievement) {
            if ($uniqueHabits >= $achievement->required_count && !$user->hasAchievement($achievement->id)) {
                $this->awardAchievement($user, $achievement);
            }
        }
    }

    private function awardAchievement(User $user, Achievement $achievement)
    {
        $user->achievements()->attach($achievement->id, [
            'earned_at' => Carbon::now()
        ]);

        $user->notify(new AchievementUnlocked($achievement));
    }

    private function calculateCurrentStreak(User $user)
    {
        $streak = 0;
        $date = Carbon::today();

        while (true) {
            $hasProgress = HabitProgress::where('user_id', $user->id)
                ->whereDate('date', $date)
                ->where('completed', true)
                ->exists();

            if (!$hasProgress) break;
            
            $streak++;
            $date = $date->subDay();
        }

        return $streak;
    }
}