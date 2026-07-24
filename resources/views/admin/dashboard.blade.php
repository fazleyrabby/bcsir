@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>Dashboard</h1>
        <span class="text-muted">Welcome, {{ auth('admin')->user()?->name ?? 'Admin' }}</span>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card card-sm stat-card">
                <div class="card-body text-center">
                    <div class="text-secondary mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-community" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2e86c1" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"/><path d="M13 7l0 .01"/><path d="M17 7l0 .01"/><path d="M17 11l0 .01"/><path d="M17 15l0 .01"/></svg>
                    </div>
                    <div class="h1 mt-2 mb-1">{{ $stats['departments'] }}</div>
                    <div class="text-secondary">Departments</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-sm stat-card">
                <div class="card-body text-center">
                    <div class="text-secondary mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2e86c1" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/><path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/></svg>
                    </div>
                    <div class="h1 mt-2 mb-1">{{ $stats['employees'] }}</div>
                    <div class="text-secondary">Employees</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-sm stat-card">
                <div class="card-body text-center">
                    <div class="text-secondary mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2e86c1" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"/><path d="M8 8l4 0"/><path d="M8 12l4 0"/><path d="M8 16l4 0"/></svg>
                    </div>
                    <div class="h1 mt-2 mb-1">{{ $stats['news'] }}</div>
                    <div class="text-secondary">News</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-sm stat-card">
                <div class="card-body text-center">
                    <div class="text-secondary mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2e86c1" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"/><path d="M3 7l9 6l9 -6"/></svg>
                    </div>
                    <div class="h1 mt-2 mb-1">{{ $stats['messages'] }}</div>
                    <div class="text-secondary">Unread Messages</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent News</h3>
                </div>
                <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th class="w-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentNews as $news)
                                <tr>
                                    <td><a href="{{ route('admin.news.edit', $news) }}">{{ \Illuminate\Support\Str::limit($news->title, 50) }}</a></td>
                                    <td class="text-muted">{{ $news->created_at->format('d M Y') }}</td>
                                    <td><a href="{{ route('admin.news.edit', $news) }}" class="btn btn-sm btn-outline-primary">Edit</a></td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-muted">No news yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Messages</h3>
                </div>
                <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentMessages as $msg)
                                <tr>
                                    <td>{{ $msg->name }}</td>
                                    <td class="text-muted">{{ \Illuminate\Support\Str::limit($msg->subject ?? 'No subject', 30) }}</td>
                                    <td class="text-muted">{{ $msg->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-muted">No messages yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
