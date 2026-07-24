@extends('layouts.app')

@section('title', __('Departments & Research Wings') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-building-columns" style="color: var(--primary-emerald);"></i> {{ __('Departments & Research Wings') }}</h1>
            <p>{{ __('Explore the specialized scientific divisions and administrative wings of NIRST') }}</p>
        </div>
    </div>

    <div class="container">
        @foreach($departments as $type => $deptList)
            <div style="margin-bottom: 35px;">
                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px; border-bottom: 2px solid var(--primary-emerald); padding-bottom: 8px;">
                    <i class="fa-solid fa-layer-group" style="color: var(--primary-emerald); font-size: 1.3rem;"></i>
                    <h2 style="margin: 0; color: var(--primary-dark); font-size: 1.4rem; font-weight: 700;">{{ $type }}</h2>
                </div>
                <div class="grid grid-2">
                    @foreach($deptList as $dept)
                        <div class="card" style="display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <div style="display: inline-block; background: var(--primary-mint); color: var(--primary-dark); font-size: 0.75rem; font-weight: 700; padding: 2px 10px; border-radius: var(--radius-sm); margin-bottom: 8px;">
                                    <i class="fa-solid fa-flask"></i> {{ $type }}
                                </div>
                                <h3 style="margin: 0 0 8px 0;">
                                    <a href="{{ route('departments.show', $dept->slug ?? $dept->id) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700; font-size:1.15rem;">
                                        {{ $dept->name }}
                                    </a>
                                </h3>
                                @if($dept->description)
                                    <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 12px;">
                                        {{ \Illuminate\Support\Str::limit($dept->description, 150) }}
                                    </p>
                                @endif
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 12px; border-top: 1px solid var(--border-subtle); margin-top: 12px;">
                                <span style="font-size: 0.82rem; color: var(--text-muted); font-weight: 600;">
                                    <i class="fa-solid fa-users" style="color: var(--primary-emerald);"></i> {{ $dept->employees_count ?? 0 }} Staff Members
                                </span>
                                <a href="{{ route('departments.show', $dept->slug ?? $dept->id) }}" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8rem;">
                                    {{ __('Explore Division') }} →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
