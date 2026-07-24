@extends('admin.layouts.master')

@section('title', isset($notice) ? 'Edit Notice' : 'New Notice')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($notice) ? 'Edit Notice' : 'New Notice' }}</h1>
        <a href="{{ route('admin.notices.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($notice) ? route('admin.notices.update', $notice) : route('admin.notices.store') }}">
                @csrf
                @if(isset($notice)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $notice->title ?? '') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $notice->slug ?? '') }}" placeholder="Leave empty to auto-generate">
                </div>

                <div class="grid-2">
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" id="category" name="category" class="form-control" value="{{ old('category', $notice->category ?? '') }}" placeholder="e.g. Tender, Notice, Circular">
                    </div>

                    <div class="mb-3">
                        <label for="publish_date" class="form-label">Publish Date</label>
                        <input type="date" id="publish_date" name="publish_date" class="form-control" value="{{ old('publish_date', isset($notice) && $notice->publish_date ? $notice->publish_date->format('Y-m-d') : '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="10">{{ old('content', $notice->content ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">Attachment (PDF)</label>
                    <input type="file" id="file" name="file" class="form-control">
                    @if(isset($notice) && $notice->file)
                        <div class="mt-2">
                            <span class="text-muted small">Current: {{ $notice->file }}</span>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $notice->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($notice) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.notices.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
