<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHabit extends Model
{
    protected $fillable = [
        'user_id',
        'habit_id',
        'habit_template_id',
        'name',
        'description',
        'category',
        'frequency',
        'frequency_type',
        'reminder_time',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    public function template()
    {
        return $this->belongsTo(HabitTemplate::class, 'habit_template_id');
    }
}
