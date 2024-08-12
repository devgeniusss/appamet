<?php

use App\Models\Domain;
use Illuminate\Support\Facades\Route;

if (!function_exists('getSubDomain')) {
    function getSubDomain()
    {
        $subdomain = request()->getHost();
        return $sub = explode('.', $subdomain)[0];
    }
}

if (!function_exists('currentDomainId')) {
    function currentDomainId()
    {
        $subdomain = Domain::where('name', getSubDomain())->first();
        return $subdomain ? $subdomain->id : null;
    }
}

if (!function_exists('subDomainRoute')) {
    function subDomainRoute($routeName, $params = [])
    {
        return Route::subdomain($routeName, $params);
    }
}
