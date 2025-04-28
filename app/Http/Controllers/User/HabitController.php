<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use App\Models\HabitTemplate;
use App\Models\UserHabit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HabitController extends Controller
{
    public function index()
    {
        $habits = auth()->user()->habits()->with('progress')->get();
        $todayProgress = auth()->user()->progress()
            ->whereDate('date', today())
            ->count();
        
        return view('user.habits.index', compact('habits', 'todayProgress'));
    }

    public function create()
    {
        return view('user.habits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'frequency' => 'required|string',
            'reminder_time' => 'nullable|date_format:H:i'
        ]);

        $habit = Habit::create($validated);
        auth()->user()->habits()->attach($habit->id, ['is_active' => true]);

        return redirect()->route('dashboard')
            ->with('success', 'Habit created successfully.');
    }

    public function updateProgress(Request $request, Habit $habit)
    {
        try {
            $progress = auth()->user()->progress()->create([
                'habit_id' => $habit->id,
                'completed' => true,
                'date' => now(),
                'user_id' => auth()->id()
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Habit marked as completed'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating progress'
            ], 500);
        }
    }

    public function recommended()
    {
        // Modificamos la consulta para obtener todos los hábitos activos
        $recommendedHabits = HabitTemplate::where('is_active', true)
            ->whereNotExists(function($query) {
                $query->select('id')
                      ->from('user_habits')
                      ->whereColumn('habit_template_id', 'habit_templates.id')
                      ->where('user_id', Auth::id());
            })
            ->get();
            
        return view('user.habits.recommended', compact('recommendedHabits'));
    }

    public function adopt(HabitTemplate $habit)
    {
        // Verificar si ya existe
        $existingHabit = UserHabit::where('user_id', Auth::id())
            ->where('habit_template_id', $habit->id)
            ->first();
    
        if (!$existingHabit) {
            UserHabit::create([
                'user_id' => Auth::id(),
                'habit_template_id' => $habit->id,
                'name' => $habit->name,
                'description' => $habit->description,
                'category' => $habit->category,
                'frequency' => $habit->frequency,
                'frequency_type' => $habit->frequency_type,
                'is_active' => true
            ]);
    
            return redirect()->route('user.habits.index')
                ->with('success', 'Hábito adoptado exitosamente');
        }
    
        return back()->with('error', 'Ya has adoptado este hábito');
    }
}
