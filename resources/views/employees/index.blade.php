@extends('layouts.app')

@section('title', __('Employees') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-users-gear" style="color: var(--primary-emerald);"></i> {{ __('Employees') }}</h1>
            <p>Dedicated researchers, officers, and technical personnel</p>
        </div>
    </div>

    <div class="container">
        <div class="grid grid-3">
            @forelse($employees as $employee)
                <div class="card employee-card">
                    <div class="employee-photo-wrapper">
                        @if($employee->photo)
                            <img src="{{ str_starts_with($employee->photo, 'http') ? $employee->photo : asset('images/' . $employee->photo) }}" alt="{{ $employee->name }}" class="employee-photo" onerror="this.src='https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80';">
                        @else
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--primary-mint); display: flex; align-items: center; justify-content: center; font-size: 2.5rem; color: var(--primary-emerald); border: 3px solid var(--primary-emerald); margin: 0 auto;">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif
                    </div>
                    <h3 style="margin: 0 0 4px 0; font-size: 1.1rem;">
                        <a href="{{ route('employees.show', $employee) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                            {{ $employee->name }}
                        </a>
                    </h3>
                    <div style="color: var(--primary-emerald); font-weight: 600; font-size: 0.85rem; margin-bottom: 6px;">
                        {{ $employee->designation ?? 'Staff Member' }}
                    </div>
                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 10px;">
                        <i class="fa-solid fa-building-columns"></i> {{ $employee->department?->name ?? 'NIRST' }}
                    </div>
                    <span style="display: inline-block; background: var(--primary-mint); color: var(--primary-dark); font-size: 0.75rem; font-weight: 700; padding: 2px 10px; border-radius: var(--radius-sm);">
                        {{ ucfirst($employee->type) }}
                    </span>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--text-muted);">
                    <p>No employee records found.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $employees->links() }}
        </div>
    </div>
@endsection
