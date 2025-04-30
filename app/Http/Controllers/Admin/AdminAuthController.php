<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = \App\Models\Admin::where('username', $credentials['username'])
                                 ->where('password', $credentials['password'])
                                 ->first();

        if ($admin) {
            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');  // Esto redirigirá a welcome.blade.php
    }
}