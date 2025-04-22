<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'frequency',
        'reminder_time'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_habits')
            ->withPivot('is_active')
            ->withTimestamps();
    }

    public function progress()
    {
        return $this->hasMany(HabitProgress::class);
    }
}
