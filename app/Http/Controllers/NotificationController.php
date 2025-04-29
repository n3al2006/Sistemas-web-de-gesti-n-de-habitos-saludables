<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\UserHabit;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        $notification->update(['is_read' => true]);
        return back();
    }

    public function checkDueHabits()
    {
        $habits = UserHabit::where('user_id', auth()->id())
            ->where('is_active', true)
            ->get();

        foreach ($habits as $habit) {
            if ($habit->reminder_time == now()->format('H:i')) {
                Notification::create([
                    'user_id' => auth()->id(),
                    'habit_id' => $habit->id,
                    'title' => '¡Hora de tu hábito!',
                    'message' => "Es hora de realizar tu hábito: {$habit->name}",
                    'reminder_time' => $habit->reminder_time
                ]);
            }
        }
    }
}