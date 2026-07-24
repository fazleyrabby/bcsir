<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        $research = Research::with('scientist')->orderBy('year', 'desc')->paginate(15);
        return view('admin.research.index', compact('research'));
    }

    public function create()
    {
        $scientists = Employee::where('is_active', true)->where('type', 'scientist')->orderBy('name')->get();
        return view('admin.research.form', compact('scientists'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scientist_id' => 'nullable|exists:employees,id',
            'abstract' => 'nullable|string',
            'file' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:2099',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        Research::create($validated);

        return redirect()->route('admin.research.index')
            ->with('success', 'Research created successfully.');
    }

    public function edit(Research $research)
    {
        $scientists = Employee::where('is_active', true)->where('type', 'scientist')->orderBy('name')->get();
        return view('admin.research.form', compact('research', 'scientists'));
    }

    public function update(Request $request, Research $research)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'scientist_id' => 'nullable|exists:employees,id',
            'abstract' => 'nullable|string',
            'file' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:2099',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $research->update($validated);

        return redirect()->route('admin.research.index')
            ->with('success', 'Research updated successfully.');
    }

    public function destroy(Research $research)
    {
        $research->delete();
        return redirect()->route('admin.research.index')
            ->with('success', 'Research deleted successfully.');
    }
}
