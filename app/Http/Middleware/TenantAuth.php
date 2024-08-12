<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TenantAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $user = Auth::user();
        if (!$user) {
            return redirect(subDomainRoute('admin.login.view'));
        }

        $domains = $user->domains->pluck('name')->toArray();
        if (count($domains) == 0) {
            return redirect(env('CENTREL_DOMAIN'));
        }
        if ($user && !in_array(getSubDomain(), $domains)) {
            return redirect($domains[0] . '.' . env('CENTREL_DOMAIN') . '/admin/login');
        }

        return $next($request);
    }
}
