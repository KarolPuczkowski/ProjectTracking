<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  Comma-separated list of allowed roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $roles)
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Split roles string into array and normalize
        $allowedRoles = array_map('trim', explode(',', $roles));

        // Check if user role is in allowed roles
        if (!in_array($user->role, $allowedRoles, true)) {
            abort(403, 'Forbidden');
        }

        return $next($request);
    }
}