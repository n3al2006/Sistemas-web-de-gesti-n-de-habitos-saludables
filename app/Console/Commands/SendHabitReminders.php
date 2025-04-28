<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserHabit;
use App\Notifications\HabitReminder;
use Carbon\Carbon;

class SendHabitReminders extends Command
{
    protected $signature = 'habits:send-reminders';
    protected $description = 'Send reminders to users for their scheduled habits';

    public function handle()
    {
        $now = Carbon::now();
        
        UserHabit::with(['user', 'habit'])
            ->where('is_active', true)
            ->get()
            ->each(function ($userHabit) use ($now) {
                $schedule = json_decode($userHabit->schedule, true);
                if ($this->shouldSendReminder($schedule, $now)) {
                    $userHabit->user->notify(new HabitReminder($userHabit->habit));
                }
            });

        $this->info('Habit reminders sent successfully!');
    }

    private function shouldSendReminder($schedule, $now)
    {
        if (empty($schedule)) {
            return false;
        }

        $currentDay = strtolower($now->format('l'));
        $currentHour = $now->format('H:i');

        if (!isset($schedule[$currentDay])) {
            return false;
        }

        foreach ($schedule[$currentDay] as $time) {
            $scheduledTime = Carbon::createFromFormat('H:i', $time);
            $difference = $now->diffInMinutes($scheduledTime, false);
            
            // Send reminder if within 15 minutes before scheduled time
            if ($difference >= -15 && $difference <= 0) {
                return true;
            }
        }

        return false;
    }
}
