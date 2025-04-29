<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HabitTemplate;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index()
    {
        $habits = HabitTemplate::all();
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
            'category' => 'nullable|string|max:255',
            'frequency' => 'required|integer|min:1',
            'frequency_type' => 'required|in:daily,weekly,monthly',
            'is_active' => 'boolean'
        ]);

        HabitTemplate::create($validated);
        return redirect()->route('admin.habits.index')->with('success', 'Habito creado correctamente');
    }

    public function edit(HabitTemplate $habit)
    {
        return view('admin.habits.edit', compact('habit'));
    }

    public function update(Request $request, HabitTemplate $habit)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'frequency' => 'required|integer|min:1',
            'frequency_type' => 'required|in:daily,weekly,monthly',
            'is_active' => 'boolean'
        ]);

        $habit->update($validated);
        return redirect()->route('admin.habits.index')->with('success', 'Habito actualizado correctamente');
    }

    public function destroy(HabitTemplate $habit)
    {
        $habit->delete();
        return redirect()->route('admin.habits.index')->with('success', 'Habito eliminado correctamente');
    }
}
