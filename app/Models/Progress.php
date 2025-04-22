<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progress';
    
    protected $fillable = [
        'user_id',
        'habit_id',
        'date',
        'completed'
    ];

    protected $casts = [
        'date' => 'datetime',
        'completed' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
