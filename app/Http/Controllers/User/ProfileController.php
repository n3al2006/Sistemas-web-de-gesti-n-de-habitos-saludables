<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'notification_preferences' => 'array',
            'timezone' => 'required|string'
        ]);

        $user->update($validated);

        return redirect()->route('user.profile.edit')
            ->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed'
        ]);

        auth()->user()->update([
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('user.profile.edit')
            ->with('success', 'Password updated successfully');
    }
}
