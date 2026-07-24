@extends('admin.layouts.master')

@section('title', 'Message from ' . $message->name)

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>Message</h1>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <strong>From:</strong> {{ $message->name }} ({{ $message->email }})
            </div>
            <div class="mb-3">
                <strong>Subject:</strong> {{ $message->subject ?? 'N/A' }}
            </div>
            <div class="mb-3">
                <strong>Date:</strong> {{ $message->created_at->format('d M Y h:i A') }}
            </div>
            <hr>
            <p>{{ $message->message }}</p>
            <hr>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Message</button>
            </form>
        </div>
    </div>
@endsection
