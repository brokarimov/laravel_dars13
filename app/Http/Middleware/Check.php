<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRoles = Auth::user()->roles;
        
        if (Auth::check() && $userRoles->whereIn('role', $roles)->whereIn('is_active', 1)->first()) {
            foreach (Auth::user()->roles as $roles) {
                    return $next($request);
            }
        }
        abort(403);
    }
}
