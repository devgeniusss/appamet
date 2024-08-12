<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class EnforceHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // URL::forceScheme('http');
        // if (!$request->secure()) {
        //     // dd('sadas');
        //     return $next($request);
        // }
        // if ($request->secure()) {
        //     $httpUrl = 'http://' . $request->getHost() . $request->getRequestUri();
        //     return redirect()->to($httpUrl, 301);
        // }
        return $next($request);
    }
}
