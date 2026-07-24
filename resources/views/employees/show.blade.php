@extends('layouts.app')

@section('title', $employee->name)

@section('content')
    <div class="page-title-banner">
        <div class="container">
            <h1><i class="fa-solid fa-id-badge" style="color: var(--primary-emerald);"></i> Personnel Profile</h1>
            <p>{{ $employee->name }} - {{ $employee->designation ?? 'NIRST' }}</p>
        </div>
    </div>

    <div class="container">
        <!-- Main Profile Card -->
        <div class="card">
            <div style="display:flex; gap:30px; flex-wrap:wrap; align-items:flex-start;">
                <div>
                    @if($employee->photo)
                        <img src="{{ str_starts_with($employee->photo, 'http') ? $employee->photo : asset('images/' . $employee->photo) }}" alt="{{ $employee->name }}" style="width: 150px; height: 150px; object-fit: cover; border-radius: var(--radius-md); border: 3px solid var(--primary-emerald);" onerror="this.src='https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80';">
                    @else
                        <div style="width: 150px; height: 150px; border-radius: var(--radius-md); background: var(--primary-mint); display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: var(--primary-emerald); border: 3px solid var(--primary-emerald);">
                            <i class="fa-solid fa-user-doctor"></i>
                        </div>
                    @endif
                </div>

                <div style="flex:1; min-width: 280px;">
                    <span style="display: inline-block; background: var(--primary-mint); color: var(--primary-dark); font-size: 0.78rem; font-weight: 700; padding: 2px 10px; border-radius: var(--radius-sm); margin-bottom: 8px;">
                        {{ ucfirst($employee->type) }}
                    </span>
                    <h2 style="margin: 0 0 6px 0; color: var(--primary-dark); font-size: 1.6rem; font-weight: 800;">{{ $employee->name }}</h2>
                    <div style="color: var(--primary-emerald); font-weight: 700; font-size: 1rem; margin-bottom: 14px;">
                        {{ $employee->designation ?? 'N/A' }}
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; background: var(--bg-body); padding: 14px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle);">
                        <div>
                            <div style="font-size: 0.76rem; color: var(--text-muted); font-weight: 600;">DEPARTMENT / DIVISION</div>
                            <div style="font-weight: 700; color: var(--text-dark); font-size: 0.9rem;"><i class="fa-solid fa-building-columns" style="color: var(--primary-emerald);"></i> {{ $employee->department?->name ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div style="font-size: 0.76rem; color: var(--text-muted); font-weight: 600;">EMAIL ADDRESS</div>
                            <div style="font-weight: 700; color: var(--text-dark); font-size: 0.9rem;"><i class="fa-solid fa-envelope" style="color: var(--primary-emerald);"></i> {{ $employee->email ?? 'N/A' }}</div>
                        </div>
                        <div>
                            <div style="font-size: 0.76rem; color: var(--text-muted); font-weight: 600;">PHONE NUMBER</div>
                            <div style="font-weight: 700; color: var(--text-dark); font-size: 0.9rem;"><i class="fa-solid fa-phone" style="color: var(--primary-emerald);"></i> {{ $employee->phone ?? 'N/A' }}</div>
                        </div>
                    </div>

                    @if($employee->cv_file)
                        <div style="margin-top: 16px;">
                            <a href="{{ asset('storage/cv/' . $employee->cv_file) }}" class="btn btn-emerald" target="_blank" style="font-size: 0.85rem;">
                                <i class="fa-solid fa-file-arrow-down"></i> Download Curriculum Vitae (CV)
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($employee->bio)
            <div class="card">
                <div class="card-header-styled">
                    <h3><i class="fa-solid fa-book-open"></i> Biography & Background</h3>
                </div>
                <div style="line-height: 1.7; color: var(--text-dark); font-size: 0.92rem;">
                    {!! nl2br(e($employee->bio)) !!}
                </div>
            </div>
        @endif

        @if($employee->research && $employee->research->isNotEmpty())
            <div class="card">
                <div class="card-header-styled">
                    <h3><i class="fa-solid fa-flask-vial"></i> Key Research & Publications</h3>
                </div>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($employee->research as $research)
                        <div style="padding: 14px; border-radius: var(--radius-sm); border: 1px solid var(--border-subtle); background: var(--bg-body);">
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px; margin-bottom: 6px;">
                                <h4 style="margin: 0; color: var(--primary-dark); font-size: 1rem; font-weight: 700;">
                                    {{ $research->title }}
                                </h4>
                                @if($research->year)
                                    <span style="background: var(--primary-dark); color: var(--primary-emerald); padding: 2px 8px; border-radius: var(--radius-sm); font-weight: 700; font-size: 0.76rem;">
                                        {{ $research->year }}
                                    </span>
                                @endif
                            </div>
                            @if($research->abstract)
                                <p style="margin: 0; color: var(--text-muted); font-size: 0.88rem; line-height: 1.6;">
                                    {{ \Illuminate\Support\Str::limit($research->abstract, 250) }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
