<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Services\AchievementService;

class CheckAchievements extends Command
{
    protected $signature = 'achievements:check';
    protected $description = 'Check and award achievements for all users';

    protected $achievementService;

    public function __construct(AchievementService $achievementService)
    {
        parent::__construct();
        $this->achievementService = $achievementService;
    }

    public function handle()
    {
        User::chunk(100, function ($users) {
            foreach ($users as $user) {
                $this->achievementService->checkAndAwardAchievements($user);
            }
        });

        $this->info('Achievement check completed successfully!');
    }
}