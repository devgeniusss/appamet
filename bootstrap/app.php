<?php

use App\Http\Middleware\AuthCentral;
use App\Http\Middleware\EnforceHttp;
use App\Http\Middleware\ProtectCentral;
use App\Http\Middleware\TenantAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(EnforceHttp::class);
        // $middleware->append(AuthCentral::class);
        // $middleware->append(ProtectCentral::class);
        // $middleware->append(TenantAuth::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
