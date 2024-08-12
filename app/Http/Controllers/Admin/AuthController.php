<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{

    function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            if ($user->type === 'Admin' && in_array(getSubDomain(), $user->domains->pluck('name')->toArray())) {
                return redirect(subDomainRoute('admin.dashboard'))->with(['success' => 'You are logged in on ' . $request->getHost()]);
            } else {
                Auth::logout();
                return redirect(subDomainRoute('admin.login.view'))->with(['error' => 'You do not have access to this area.']);
            }
        }


        return redirect(subDomainRoute('admin.login.view'))->withErrors(['email' => 'Invalid credentials.']);
    }


    function logout()
    {
        Auth::logout();
        return redirect(subDomainRoute('admin.login.view'));
    }
}
