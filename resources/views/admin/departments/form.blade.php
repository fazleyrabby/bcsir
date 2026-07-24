@extends('admin.layouts.master')

@section('title', isset($department) ? 'Edit Department' : 'New Department')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($department) ? 'Edit Department' : 'New Department' }}</h1>
        <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($department) ? route('admin.departments.update', $department) : route('admin.departments.store') }}">
                @csrf
                @if(isset($department)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $department->name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', $department->slug ?? '') }}" placeholder="Leave empty to auto-generate">
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" name="type" class="form-select">
                        <option value="1" {{ (old('type', $department->type ?? '') == 1) ? 'selected' : '' }}>Administrative</option>
                        <option value="2" {{ (old('type', $department->type ?? '') == 2) ? 'selected' : '' }}>Research</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sort_order" class="form-label">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $department->sort_order ?? 0) }}">
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $department->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($department) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.departments.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
