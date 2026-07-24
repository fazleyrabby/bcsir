@extends('admin.layouts.master')

@section('title', isset($page) ? 'Edit Page' : 'New Page')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($page) ? 'Edit Page' : 'New Page' }}</h1>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($page) ? route('admin.pages.update', $page) : route('admin.pages.store') }}">
                @csrf
                @if(isset($page)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $page->title ?? '') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug *</label>
                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $page->slug ?? '') }}" required>
                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="text-muted small mt-1">URL path — must be unique, e.g. <code>about-us</code></div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="12">{{ old('content', $page->content ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <input type="text" id="meta_description" name="meta_description" class="form-control" value="{{ old('meta_description', $page->meta_description ?? '') }}">
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($page) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
