<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function index()
    {
        $domains = Domain::all();
        return view('superadmin.domains.index', compact('domains'));
    }

    public function create()
    {
        return view('superadmin.domains.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:domains',
        ]);

        Domain::create([
            'name' => $request->name,
        ]);

        return redirect()->route('superadmin.domains.index')->with('success', 'Domain created successfully.');
    }

    public function edit($id)
    {
        $domain = Domain::findOrFail($id);
        return view('superadmin.domains.edit', compact('domain'));
    }

    public function update(Request $request)
    {
        $domain = Domain::findOrFail($request->id);

        $request->validate([
            'name' => 'required|string|max:255|unique:domains,name,' . $domain->id,
        ]);

        $domain->name = $request->name;
        $domain->save();

        return redirect()->route('superadmin.domains.index')->with('success', 'Domain updated successfully.');
    }

    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);
        $domain->delete();

        return redirect()->route('superadmin.domains.index')->with('success', 'Domain deleted successfully.');
    }
}
