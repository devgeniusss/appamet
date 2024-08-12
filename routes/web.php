<?php

use App\Http\Middleware\AuthCentral;
use App\Http\Middleware\ProtectCentral;
use App\Http\Middleware\TenantAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::domain('{sub}.' . env('CENTREL_DOMAIN'))->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login.view');
        Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login');

        Route::middleware(TenantAuth::class)->group(function () {
            Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

            Route::get('/home', [App\Http\Controllers\Admin\DashbaordController::class, 'index'])->name('dashboard');

            //users
            Route::name('users.')->prefix('users')->group(function () {
                Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
                Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
                Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
                Route::post('/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
                Route::get('/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
            });
        });
    });
});



//central route
Route::name('superadmin.')->middleware(ProtectCentral::class)->group(function () {

    Route::get('login', [App\Http\Controllers\SuperAdmin\AuthController::class, 'showLoginForm'])->name('login.view');
    Route::post('login', [App\Http\Controllers\SuperAdmin\AuthController::class, 'login'])->name('login');

    Route::group(['middleware' => [AuthCentral::class]], function () {
        Route::get('logout', [App\Http\Controllers\SuperAdmin\AuthController::class, 'logout'])->name('logout');

        Route::get('/home', function () {
            return view('superadmin.dashboard');
        })->name('dashboard');

        //domains
        Route::name('domains.')->prefix('domains')->group(function () {
            Route::get('/', [App\Http\Controllers\SuperAdmin\DomainsController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\SuperAdmin\DomainsController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\SuperAdmin\DomainsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\SuperAdmin\DomainsController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\SuperAdmin\DomainsController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [App\Http\Controllers\SuperAdmin\DomainsController::class, 'destroy'])->name('destroy');
        });
        //admins
        Route::name('admins.')->prefix('admins')->group(function () {
            Route::get('/', [App\Http\Controllers\SuperAdmin\AdminsController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\SuperAdmin\AdminsController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\SuperAdmin\AdminsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\SuperAdmin\AdminsController::class, 'edit'])->name('edit');
            Route::post('/update', [App\Http\Controllers\SuperAdmin\AdminsController::class, 'update'])->name('update');
            Route::get('/destroy/{id}', [App\Http\Controllers\SuperAdmin\AdminsController::class, 'destroy'])->name('destroy');
        });
    });
});
