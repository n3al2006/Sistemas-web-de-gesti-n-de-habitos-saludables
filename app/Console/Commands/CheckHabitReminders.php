<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserHabit;
use App\Models\Notification;
use Carbon\Carbon;

class CheckHabitReminders extends Command
{
    protected $signature = 'habits:check-reminders';
    protected $description = 'Check for habit reminders and create notifications';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Checking habit reminders...');
        
        $habits = UserHabit::where('is_active', true)
            ->whereNotNull('reminder_time')
            ->get();

        $this->info("Found {$habits->count()} active habits with reminders");

        foreach ($habits as $habit) {
            // Simplify time comparison
            $reminderTime = Carbon::parse($habit->reminder_time)->format('H:i');
            $currentTime = now()->format('H:i');

            $this->info("Checking habit: {$habit->name}");
            $this->info("Reminder time: {$reminderTime}");
            $this->info("Current time: {$currentTime}");

            if ($reminderTime === $currentTime) {
                $this->info("Creating notification for habit: {$habit->name}");
                
                try {
                    $notification = Notification::create([
                        'user_id' => $habit->user_id,
                        'habit_id' => $habit->id,
                        'title' => '¡Recordatorio de Hábito!',
                        'message' => "Es hora de realizar tu hábito: {$habit->name}",
                        'is_read' => false
                    ]);
                    
                    $this->info("Notification created successfully: {$notification->id}");
                } catch (\Exception $e) {
                    $this->error("Error creating notification: " . $e->getMessage());
                }
            }
        }

        $this->info('Finished checking reminders.');
    }
}
