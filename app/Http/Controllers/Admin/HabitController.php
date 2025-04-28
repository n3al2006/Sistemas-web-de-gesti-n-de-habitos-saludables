<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index()
    {
        $habits = Habit::withCount('users')->get();
        return view('admin.habits.index', compact('habits'));
    }

    public function create()
    {
        return view('admin.habits.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'frequency' => 'required|string',
            'reminder_time' => 'nullable|date_format:H:i'
        ]);

        Habit::create($validated);
        return redirect()->route('admin.habits.index')->with('success', 'Habit created successfully');
    }

    public function edit(Habit $habit)
    {
        return view('admin.habits.edit', compact('habit'));
    }

    public function update(Request $request, Habit $habit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'frequency' => 'required|string',
            'reminder_time' => 'nullable|date_format:H:i'
        ]);

        $habit->update($validated);
        return redirect()->route('admin.habits.index')->with('success', 'Habit updated successfully');
    }

    public function destroy(Habit $habit)
    {
        $habit->delete();
        return redirect()->route('admin.habits.index')->with('success', 'Habit deleted successfully');
    }
}
