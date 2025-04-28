<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitTemplate extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'frequency',
        'frequency_type',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}