@extends('admin.layouts.master')

@section('title', 'Pages')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>Pages</h1>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14"/><path d="M5 12l14 0"/></svg>
            New Page
        </a>
    </div>

    <div class="card">
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td><a href="{{ route('pages.show', $page) }}" target="_blank" class="text-reset fw-medium">{{ $page->title }}</a></td>
                            <td class="text-muted">/{{ $page->slug }}</td>
                            <td>
                                @if($page->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-outline-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" onsubmit="return confirm('Delete this page?')">
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
        @if(method_exists($pages, 'links'))
            <div class="card-footer">{{ $pages->links("pagination::bootstrap-5") }}</div>
        @endif
    </div>
@endsection
