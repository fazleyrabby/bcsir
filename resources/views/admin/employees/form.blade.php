@extends('admin.layouts.master')

@section('title', isset($employee) ? 'Edit Employee' : 'New Employee')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($employee) ? 'Edit Employee' : 'New Employee' }}</h1>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($employee) ? route('admin.employees.update', $employee) : route('admin.employees.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($employee)) @method('PUT') @endif

                <div class="grid-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $employee->name ?? '') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" id="designation" name="designation" class="form-control" value="{{ old('designation', $employee->designation ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select id="department_id" name="department_id" class="form-select">
                            <option value="">— Select —</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ old('department_id', $employee->department_id ?? '') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select id="type" name="type" class="form-select">
                            <option value="employee" {{ old('type', $employee->type ?? '') == 'employee' ? 'selected' : '' }}>Employee</option>
                            <option value="scientist" {{ old('type', $employee->type ?? '') == 'scientist' ? 'selected' : '' }}>Scientist</option>
                            <option value="director" {{ old('type', $employee->type ?? '') == 'director' ? 'selected' : '' }}>Director</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="education" class="form-label">Education</label>
                        <input type="text" id="education" name="education" class="form-control" value="{{ old('education', $employee->education ?? '') }}">
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" class="form-control" value="{{ old('sort_order', $employee->sort_order ?? 0) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control">
                    @if(isset($employee) && $employee->photo)
                        <div class="mt-2">
                            <img src="{{ asset('images/' . $employee->photo) }}" alt="" class="avatar avatar-lg">
                            <span class="text-muted ms-2 small">{{ $employee->photo }}</span>
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="bio" class="form-label">Bio / Description</label>
                    <textarea id="bio" name="bio" class="form-control" rows="4">{{ old('bio', $employee->bio ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $employee->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
