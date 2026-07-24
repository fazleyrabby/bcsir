@extends('layouts.app')

@section('title', $department->name)

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-building-columns" style="color: var(--primary-emerald);"></i> {{ $department->name }}</h1>
            <p>{{ $department->type == 1 ? 'Administrative Division' : 'Scientific Research Wing' }}</p>
        </div>
    </div>

    <div class="container">
        <div class="card" style="margin-bottom: 30px;">
            <h3 style="color: var(--primary-dark); margin: 0 0 12px 0;"><i class="fa-solid fa-circle-info" style="color: var(--primary-emerald);"></i> Division Overview</h3>
            @if($department->description)
                <p style="font-size: 0.95rem; color: var(--text-dark); line-height: 1.7; margin-bottom: 16px;">{{ $department->description }}</p>
            @endif
            <div style="display: flex; gap: 20px; font-size: 0.84rem; color: var(--text-muted); border-top: 1px solid var(--border-subtle); padding-top: 10px;">
                <span><strong>Category:</strong> {{ $department->type == 1 ? 'Administrative' : 'Research & Development' }}</span>
                <span><strong>Sorting Priority:</strong> #{{ $department->sort_order }}</span>
            </div>
        </div>

        <div class="card-header-styled">
            <h2><i class="fa-solid fa-users" style="color: var(--primary-emerald);"></i> Department Personnel & Researchers ({{ $employees->count() }})</h2>
        </div>

        <div class="grid grid-3">
            @forelse($employees as $employee)
                <div class="card employee-card">
                    <div class="employee-photo-wrapper">
                        @if($employee->photo)
                            <img src="{{ str_starts_with($employee->photo, 'http') ? $employee->photo : asset('images/' . $employee->photo) }}" alt="{{ $employee->name }}" class="employee-photo" onerror="this.src='https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80';">
                        @else
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--primary-mint); display: flex; align-items: center; justify-content: center; font-size: 2.5rem; color: var(--primary-emerald); border: 3px solid var(--primary-emerald); margin: 0 auto;">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                        @endif
                    </div>
                    <h3 style="margin: 0 0 4px 0; font-size: 1.05rem;">
                        <a href="{{ route('employees.show', $employee) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                            {{ $employee->name }}
                        </a>
                    </h3>
                    <div style="color: var(--primary-emerald); font-weight: 600; font-size: 0.85rem; margin-bottom: 8px;">
                        {{ $employee->designation ?? 'Personnel' }}
                    </div>
                    <span style="display: inline-block; background: var(--primary-mint); color: var(--primary-dark); font-size: 0.75rem; font-weight: 700; padding: 2px 10px; border-radius: var(--radius-sm);">
                        {{ ucfirst($employee->type) }}
                    </span>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 30px; text-align: center; color: var(--text-muted);">
                    <i class="fa-solid fa-folder-open" style="font-size: 2.5rem; color: var(--primary-emerald); margin-bottom: 10px;"></i>
                    <p>No active employees currently listed under this department.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
