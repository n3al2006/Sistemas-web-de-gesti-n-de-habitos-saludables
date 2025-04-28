<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Habit;
use App\Models\HabitProgress;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role && $this->role->name === 'admin';
    }

    public function isUser()
    {
        return $this->role && $this->role->name === 'user';
    }

    public function hasRole($roleName)
    {
        return $this->role && $this->role->name === $roleName;
    }

    public function habits()
    {
        return $this->belongsToMany(Habit::class, 'user_habits')
            ->withPivot('is_active')
            ->withTimestamps();
    }

    public function calculateStreak()
    {
        $streak = 0;
        $currentDate = now()->startOfDay();
        $lastActivity = $this->progress()
            ->orderBy('date', 'desc')
            ->first();
    
        if (!$lastActivity) {
            return 0;
        }
    
        // Si la última actividad no es de hoy, reiniciar racha
        if ($lastActivity->date->startOfDay()->diffInDays($currentDate) > 1) {
            return 0;
        }
    
        // Contar días consecutivos hacia atrás
        $date = $currentDate->copy();
        while (true) {
            $hasActivity = $this->progress()
                ->whereDate('date', $date)
                ->exists();
    
            if (!$hasActivity) {
                break;
            }
    
            $streak++;
            $date->subDay();
        }
    
        return $streak;
    }
    
    // Añadir método para contar hábitos completados hoy
    public function getCompletedHabitsToday()
    {
        return $this->progress()
            ->whereDate('date', now()->toDateString())
            ->distinct('habit_id')
            ->count();
    }
    
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}
