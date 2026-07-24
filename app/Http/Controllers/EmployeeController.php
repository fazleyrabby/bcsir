<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::where('is_active', true)
            ->with('department')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('employees.index', compact('employees'));
    }

    public function scientists()
    {
        $scientists = Employee::where('is_active', true)
            ->where('type', 'scientist')
            ->with('department', 'research')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('employees.scientists', compact('scientists'));
    }

    public function show(Employee $employee)
    {
        $employee->load('department', 'research');
        return view('employees.show', compact('employee'));
    }
}
