<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function showLoginForm()
    {
        return view('superadmin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->type === 'SuperAdmin') {
                return redirect()->route('superadmin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('superadmin.login')->withErrors(['error' => 'You do not have access to this area.']);
            }
        }


        return redirect()->route('superadmin.login')->withErrors(['email' => 'Invalid credentials.']);
    }


    function logout()
    {
        Auth::logout();
        return redirect()->route('superadmin.login.view');
    }
}
