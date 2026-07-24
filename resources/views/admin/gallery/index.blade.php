@extends('admin.layouts.master')

@section('title', 'Gallery Albums')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>Gallery Albums</h1>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14"/><path d="M5 12l14 0"/></svg>
            New Album
        </a>
    </div>

    <div class="card">
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Images</th>
                        <th>Active</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                        <tr>
                            <td>
                                <a href="{{ route('gallery.show', $album->id) }}" target="_blank" class="text-reset fw-medium">{{ $album->name }}</a>
                            </td>
                            <td>
                                <span class="badge bg-secondary">{{ $album->items_count ?? 0 }} images</span>
                            </td>
                            <td>
                                @if($album->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.gallery.edit', $album) }}" class="btn btn-outline-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin.gallery.destroy', $album) }}" onsubmit="return confirm('Delete this album and its images?')">
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
        @if(method_exists($albums, 'links'))
            <div class="card-footer">{{ $albums->links("pagination::bootstrap-5") }}</div>
        @endif
    </div>
@endsection
