<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Achievement;

class AchievementUnlocked extends Notification
{
    use Queueable;

    private $achievement;

    public function __construct(Achievement $achievement)
    {
        $this->achievement = $achievement;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Achievement Unlocked!')
            ->line('Congratulations! You\'ve earned a new achievement:')
            ->line($this->achievement->name)
            ->line($this->achievement->description)
            ->action('View Your Achievements', url('/achievements'));
    }

    public function toArray($notifiable)
    {
        return [
            'achievement_id' => $this->achievement->id,
            'name' => $this->achievement->name,
            'description' => $this->achievement->description,
            'icon' => $this->achievement->icon,
        ];
    }
}