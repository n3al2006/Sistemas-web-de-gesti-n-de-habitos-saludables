<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementsSeeder extends Seeder
{
    public function run()
    {
        $achievements = [
            // Streak Achievements
            [
                'name' => 'Week Warrior',
                'description' => 'Maintain a 7-day streak',
                'icon' => 'fas fa-fire',
                'type' => 'streak',
                'required_count' => 7
            ],
            [
                'name' => 'Fortnight Champion',
                'description' => 'Maintain a 14-day streak',
                'icon' => 'fas fa-fire-alt',
                'type' => 'streak',
                'required_count' => 14
            ],
            [
                'name' => 'Monthly Master',
                'description' => 'Maintain a 30-day streak',
                'icon' => 'fas fa-crown',
                'type' => 'streak',
                'required_count' => 30
            ],

            // Completion Achievements
            [
                'name' => 'Getting Started',
                'description' => 'Complete 10 habit tasks',
                'icon' => 'fas fa-star',
                'type' => 'completion',
                'required_count' => 10
            ],
            [
                'name' => 'Habit Builder',
                'description' => 'Complete 50 habit tasks',
                'icon' => 'fas fa-stars',
                'type' => 'completion',
                'required_count' => 50
            ],
            [
                'name' => 'Habit Master',
                'description' => 'Complete 100 habit tasks',
                'icon' => 'fas fa-medal',
                'type' => 'completion',
                'required_count' => 100
            ],

            // Diversity Achievements
            [
                'name' => 'Explorer',
                'description' => 'Track 3 different habits',
                'icon' => 'fas fa-compass',
                'type' => 'diversity',
                'required_count' => 3
            ],
            [
                'name' => 'Diversifier',
                'description' => 'Track 5 different habits',
                'icon' => 'fas fa-layer-group',
                'type' => 'diversity',
                'required_count' => 5
            ],
            [
                'name' => 'Life Balancer',
                'description' => 'Track 10 different habits',
                'icon' => 'fas fa-balance-scale',
                'type' => 'diversity',
                'required_count' => 10
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}