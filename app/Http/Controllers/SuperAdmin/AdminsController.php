<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = User::where('type', 'Admin')->get();
        return view('superadmin.admins.index', compact('admins'));
    }

    public function create()
    {
        $domains = Domain::all();
        return view('superadmin.admins.create', compact('domains'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'Admin',
        ]);

        $admin->domains()->sync($request->domains ?? []);


        return redirect()->route('superadmin.admins.index')->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $domains = Domain::all();
        $admin = User::where('type', 'Admin')->with('domains')->findOrFail($id);
        return view('superadmin.admins.edit', compact('admin', 'domains'));
    }

    public function update(Request $request)
    {
        $admin = User::where('type', 'Admin')->findOrFail($request->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();
        $admin->domains()->sync($request->domains ?? []);

        return redirect()->route('superadmin.admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::where('type', 'Admin')->findOrFail($id);
        $admin->delete();

        return redirect()->route('superadmin.admins.index')->with('success', 'Admin deleted successfully.');
    }
}
