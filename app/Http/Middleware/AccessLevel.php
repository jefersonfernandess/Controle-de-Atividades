<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AccessLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        foreach ($user->UserRole as $userRole) {
            $userRole = $userRole->role_id;
        }
        if ($userRole <= 2) {
            return redirect()->route('site.index');
        }
        
        return $next($request);
    }
}
