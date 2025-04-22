<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Services\AchievementService;
use App\Services\HabitStatisticsService;

class AchievementsController extends Controller
{
    protected $achievementService;
    protected $statsService;

    public function __construct(AchievementService $achievementService, HabitStatisticsService $statsService)
    {
        $this->achievementService = $achievementService;
        $this->statsService = $statsService;
    }

    public function index()
    {
        $user = auth()->user();
        $earnedAchievements = $user->achievements;
        
        $streakAchievements = Achievement::where('type', 'streak')
            ->get()
            ->map(function ($achievement) use ($user) {
                $achievement->earned = $user->achievements->contains($achievement->id);
                return $achievement;
            });

        $completionAchievements = Achievement::where('type', 'completion')
            ->get()
            ->map(function ($achievement) use ($user) {
                $achievement->earned = $user->achievements->contains($achievement->id);
                return $achievement;
            });

        $diversityAchievements = Achievement::where('type', 'diversity')
            ->get()
            ->map(function ($achievement) use ($user) {
                $achievement->earned = $user->achievements->contains($achievement->id);
                return $achievement;
            });

        $currentStreak = $this->achievementService->getCurrentStreak($user);
        $completionRate = $this->statsService->getUserCompletionRate($user);

        return view('user.achievements.index', compact(
            'earnedAchievements',
            'streakAchievements',
            'completionAchievements',
            'diversityAchievements',
            'currentStreak',
            'completionRate'
        ));
    }
}