<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->orderBy('sort_order')->paginate(20);
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::where('is_active', true)->orderBy('name')->get();
        return view('admin.employees.form', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:500',
            'designation'   => 'nullable|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:255',
            'bio'           => 'nullable|string',
            'cv_file'       => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'type'          => 'required|in:employee,scientist,director',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/employees'), $filename);
            $validated['photo'] = 'employees/' . $filename;
        } else {
            unset($validated['photo']);
        }

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files/cv'), $filename);
            $validated['cv_file'] = $filename;
        } else {
            unset($validated['cv_file']);
        }

        Employee::create($validated);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::where('is_active', true)->orderBy('name')->get();
        return view('admin.employees.form', compact('employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:500',
            'designation'   => 'nullable|string|max:255',
            'department_id' => 'nullable|exists:departments,id',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'email'         => 'nullable|email|max:255',
            'phone'         => 'nullable|string|max:255',
            'bio'           => 'nullable|string',
            'cv_file'       => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'type'          => 'required|in:employee,scientist,director',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('photo')) {
            if ($employee->photo && file_exists(public_path('images/' . $employee->photo))) {
                unlink(public_path('images/' . $employee->photo));
            }
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/employees'), $filename);
            $validated['photo'] = 'employees/' . $filename;
        } else {
            unset($validated['photo']);
        }

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('files/cv'), $filename);
            $validated['cv_file'] = $filename;
        } else {
            unset($validated['cv_file']);
        }

        $employee->update($validated);

        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->photo && file_exists(public_path('images/' . $employee->photo))) {
            unlink(public_path('images/' . $employee->photo));
        }
        $employee->delete();
        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
