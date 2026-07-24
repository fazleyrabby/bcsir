<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->unique('name')
            ->groupBy(function ($dept) {
                return $dept->type == 1 ? 'Administrative' : 'Research';
            });

        return view('departments.index', compact('departments'));
    }

    public function show(Department $department)
    {
        $employees = $department->employees()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('departments.show', compact('department', 'employees'));
    }
}
