@extends('admin.layouts.master')

@section('title', isset($research) ? 'Edit Research' : 'New Research')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($research) ? 'Edit Research' : 'New Research' }}</h1>
        <a href="{{ route('admin.research.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($research) ? route('admin.research.update', $research) : route('admin.research.store') }}">
                @csrf
                @if(isset($research)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $research->title ?? '') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $research->slug ?? '') }}" placeholder="Leave empty to auto-generate">
                </div>

                <div class="grid-2">
                    <div class="mb-3">
                        <label for="researcher" class="form-label">Researcher</label>
                        <input type="text" id="researcher" name="researcher" class="form-control" value="{{ old('researcher', $research->researcher ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" id="year" name="year" class="form-control" value="{{ old('year', $research->year ?? '') }}" placeholder="e.g. 2024">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="abstract" class="form-label">Abstract / Description</label>
                    <textarea id="abstract" name="abstract" class="form-control" rows="8">{{ old('abstract', $research->abstract ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File (PDF)</label>
                    <input type="file" id="file" name="file" class="form-control">
                    @if(isset($research) && $research->file)
                        <div class="mt-2">
                            <span class="text-muted small">Current: {{ $research->file }}</span>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $research->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($research) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.research.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
