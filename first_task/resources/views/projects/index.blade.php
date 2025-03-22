@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center text-primary fw-bold">Projects</h1>
    <div class="text-center mb-4">
        <a href="{{ route('projects.create') }}" class="btn btn-primary btn-lg">Create Project</a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Assigned Users</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="fw-bold">{{ $project->name }}</td>
                        <td>
                            @if ($project->users->count() > 0)
                                @foreach ($project->users as $user)
                                    <span class="badge bg-info text-dark">{{ $user->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No users assigned</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-fill"></i> Edit
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this project?');">
                                    <i class="bi bi-trash-fill"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection