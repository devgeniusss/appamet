<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', 'User')->where('domain_id', currentDomainId())->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'User',
            'domain_id' => currentDomainId(),
        ]);



        return redirect(subDomainRoute('admin.users.index'))->with('success', 'User created successfully.');
    }

    public function edit($domain, $id)
    {
        $admin = User::where('type', 'User')->where('domain_id', currentDomainId())->findOrFail($id);
        return view('admin.users.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = User::where('type', 'User')->where('domain_id', currentDomainId())->findOrFail($request->id);

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


        return redirect(subDomainRoute('admin.users.index'))->with('success', 'User updated successfully.');
    }

    public function destroy($domain, $id)
    {
        $admin = User::where('type', 'User')->where('domain_id', currentDomainId())->findOrFail($id);
        $admin->delete();

        return redirect(subDomainRoute('admin.users.index'))->with('success', 'User deleted successfully.');
    }
}
