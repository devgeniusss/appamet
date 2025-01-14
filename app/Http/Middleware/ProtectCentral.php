<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProtectCentral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->getHost());
        if ($request->getHost() !== env('CENTREL_DOMAIN') && $request->getHost() !== '127.0.0.1') {
            return abort(403, 'Access denied.');
        }

        return $next($request);
    }
}
