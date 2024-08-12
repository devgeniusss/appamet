<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthCentral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()) {
            return redirect()->route('superadmin.login.view');
        }
        if (Auth::user()) {
            if (!Auth::user()->type == 'SuperAdmin') {
                return redirect()->route('superadmin.login.view');
            }
        }

        return $next($request);
    }
}
