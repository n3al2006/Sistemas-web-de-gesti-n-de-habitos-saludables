<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class HabitReminder extends Notification
{
    use Queueable;

    private $habit;

    public function __construct($habit)
    {
        $this->habit = $habit;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reminder: Time for your habit!')
            ->line('Don\'t forget to complete your habit: ' . $this->habit->name)
            ->action('Mark as Complete', url('/habits/' . $this->habit->id))
            ->line('Stay consistent with your healthy habits!');
    }

    public function toArray($notifiable)
    {
        return [
            'habit_id' => $this->habit->id,
            'habit_name' => $this->habit->name,
            'message' => 'Time to complete your habit: ' . $this->habit->name,
        ];
    }
}
