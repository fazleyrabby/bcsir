@extends('layouts.app')

@section('title', __('Scientists') . ' - NIRST')

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-flask-vial" style="color: var(--primary-emerald);"></i> {{ __('Scientists') }}</h1>
            <p>Distinguished scientists and researchers pioneering industrial technology at NIRST</p>
        </div>
    </div>

    <div class="container">
        <div class="grid grid-3">
            @forelse($scientists as $scientist)
                <div class="card employee-card">
                    <div class="employee-photo-wrapper">
                        @if($scientist->photo)
                            <img src="{{ str_starts_with($scientist->photo, 'http') ? $scientist->photo : asset('images/' . $scientist->photo) }}" alt="{{ $scientist->name }}" class="employee-photo" onerror="this.src='https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80';">
                        @else
                            <div style="width: 120px; height: 120px; border-radius: 50%; background: var(--primary-mint); display: flex; align-items: center; justify-content: center; font-size: 2.5rem; color: var(--primary-emerald); border: 3px solid var(--primary-emerald); margin: 0 auto;">
                                <i class="fa-solid fa-atom"></i>
                            </div>
                        @endif
                    </div>
                    <h3 style="margin: 0 0 4px 0; font-size: 1.1rem;">
                        <a href="{{ route('scientists.show', $scientist) }}" style="text-decoration:none; color:var(--primary-dark); font-weight:700;">
                            {{ $scientist->name }}
                        </a>
                    </h3>
                    <div style="color: var(--primary-emerald); font-weight: 700; font-size: 0.85rem; margin-bottom: 6px;">
                        {{ $scientist->designation ?? 'Senior Scientist' }}
                    </div>
                    <div style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 14px;">
                        <i class="fa-solid fa-microscope" style="color: var(--primary-emerald);"></i> {{ $scientist->department?->name ?? 'NIRST Laboratories' }}
                    </div>
                    <a href="{{ route('scientists.show', $scientist) }}" class="btn btn-outline" style="padding: 6px 16px; font-size: 0.82rem; width: 100%;">
                        View Research Profile →
                    </a>
                </div>
            @empty
                <div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: var(--text-muted);">
                    <p>No scientists currently listed.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $scientists->links() }}
        </div>
    </div>
@endsection
