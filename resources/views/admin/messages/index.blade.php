@extends('admin.layouts.master')

@section('title', 'Messages')

@section('content')
    <div class="page-title">
        <h1>Contact Messages</h1>
    </div>

    <div class="card">
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr class="{{ !$msg->is_read ? 'table-active' : '' }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-sm me-2">{{ substr($msg->name, 0, 2) }}</span>
                                    <div>
                                        <div class="{{ !$msg->is_read ? 'fw-bold' : '' }}">{{ $msg->name }}</div>
                                        <div class="text-muted small">{{ $msg->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $msg->subject ?? 'N/A' }}</td>
                            <td class="text-muted">{{ $msg->created_at->format('d M Y h:i A') }}</td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-secondary">Read</span>
                                @else
                                    <span class="badge bg-primary">New</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-outline-primary">View</a>
                                    <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(method_exists($messages, 'links'))
            <div class="card-footer">{{ $messages->links("pagination::bootstrap-5") }}</div>
        @endif
    </div>
@endsection
