@extends('admin.layouts.master')

@section('title', 'Employees')

@section('content')
    <div class="page-title d-flex align-items-center justify-content-between">
        <h1>Employees</h1>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14"/><path d="M5 12l14 0"/></svg>
            New Employee
        </a>
    </div>

    <div class="card">
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th class="w-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $emp)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    @if($emp->photo)
                                        <span class="avatar avatar-sm me-2" style="background-image: url({{ asset('images/' . $emp->photo) }})"></span>
                                    @else
                                        <span class="avatar avatar-sm me-2">{{ substr($emp->name, 0, 2) }}</span>
                                    @endif
                                    <div>{{ $emp->name }}</div>
                                </div>
                            </td>
                            <td class="text-muted">{{ $emp->designation ?? 'N/A' }}</td>
                            <td>{{ $emp->department?->name ?? 'N/A' }}</td>
                            <td>
                                @php
                                    $badgeMap = ['employee' => 'bg-secondary', 'scientist' => 'bg-info', 'director' => 'bg-primary'];
                                @endphp
                                <span class="badge {{ $badgeMap[$emp->type] ?? 'bg-secondary' }}">{{ ucfirst($emp->type) }}</span>
                            </td>
                            <td>
                                @if($emp->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.employees.edit', $emp) }}" class="btn btn-outline-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin.employees.destroy', $emp) }}" onsubmit="return confirm('Delete this employee?')">
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
        @if(method_exists($employees, 'links'))
            <div class="card-footer">{{ $employees->links("pagination::bootstrap-5") }}</div>
        @endif
    </div>
@endsection
