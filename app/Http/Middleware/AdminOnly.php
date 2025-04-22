<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->isAdmin()) {
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}