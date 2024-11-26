<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (Auth()->check()) {
            if (Auth()->user()->role === 'Petani') {
                return route('DashboardPetani');
            } elseif (Auth()->user()->role === 'Dinas') {
                return route('DashboardDinas');
            }
        }

        return $request->expectsJson() ? null : route('login');
    }
}
