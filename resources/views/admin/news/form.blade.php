@extends('admin.layouts.master')

@section('title', isset($news) ? 'Edit News' : 'New News')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($news) ? 'Edit News' : 'New News' }}</h1>
        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}">
                @csrf
                @if(isset($news)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $news->title ?? '') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $news->slug ?? '') }}" placeholder="Leave empty to auto-generate">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="10">{{ old('content', $news->content ?? '') }}</textarea>
                </div>

                <div class="grid-2">
                    <div class="mb-3">
                        <label for="publish_date" class="form-label">Publish Date</label>
                        <input type="date" id="publish_date" name="publish_date" class="form-control" value="{{ old('publish_date', isset($news) && $news->publish_date ? $news->publish_date->format('Y-m-d') : '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if(isset($news) && $news->image)
                            <div class="mt-2">
                                <img src="{{ asset('images/' . $news->image) }}" alt="" style="max-height:60px;">
                                <span class="text-muted ms-2 small">{{ $news->image }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $news->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($news) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
