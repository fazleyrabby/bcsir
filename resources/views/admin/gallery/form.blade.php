@extends('admin.layouts.master')

@section('title', isset($album) ? 'Edit Album' : 'New Album')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>{{ isset($album) ? 'Edit Album' : 'New Album' }}</h1>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ isset($album) ? route('admin.gallery.update', $album) : route('admin.gallery.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($album)) @method('PUT') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Title *</label>
                    <input type="text" id="title" name="name" class="form-control @error('title') is-invalid @enderror" value="{{ old('name', $album->name ?? '') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="N/A" disabled class="form-control" value="{{ old('slug', $album->slug ?? '') }}" placeholder="Leave empty to auto-generate">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="4">{{ old('description', $album->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Images</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <div class="text-muted small mt-1">Upload multiple images at once (will be added to the album)</div>
                    @if(isset($album) && $album->items->count())
                        <div class="mt-2 d-flex gap-2 flex-wrap">
                            @foreach($album->items as $item)
                                <div class="position-relative">
                                    <img src="{{ asset('images/' . $item->filename) }}" alt="" style="width:80px;height:80px;object-fit:cover;border-radius:4px;">
                                    <form method="POST" action="{{ route('admin.gallery.destroy', $album) }}" class="position-absolute top-0 end-0">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger" style="line-height:1;padding:0 4px;font-size:10px;" onclick="return confirm('Remove this image?')">×</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{ old('is_active', $album->is_active ?? true) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($album) ? 'Update' : 'Create' }}</button>
                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
