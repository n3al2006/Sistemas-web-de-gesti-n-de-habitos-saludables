<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use Illuminate\Http\Request;

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
        $recommendedHabits = Habit::whereDoesntHave('users', function($query) {
            $query->where('user_id', auth()->id());
        })->take(5)->get();
    
        return view('user.habits.recommended', compact('recommendedHabits'));
    }

    public function adopt(Request $request, Habit $habit)
    {
        $habit = Habit::findOrFail($request->habit_id);
        auth()->user()->habits()->attach($habit->id, ['is_active' => true]);
    
        return redirect()->route('user.habits.index')
            ->with('success', 'Habit adopted successfully.');
    }
}
