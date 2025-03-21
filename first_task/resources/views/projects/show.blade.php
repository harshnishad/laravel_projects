@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="container my-5 shadow-lg p-4 rounded bg-white">
    <h1 class="mb-4 text-center text-primary fw-bold">{{ $project->name }}</h1>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-secondary">Project Details</h5>
            <p class="text-muted"><strong>Description:</strong> {{ $project->description }}</p>
        </div>
    </div>

    <hr>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark">Tasks</h3>
        <a href="{{ route('tasks.create', ['project' => $project->id]) }}" class="btn btn-success fw-bold shadow-sm">
            + Add Task
        </a>
    </div>

    @if ($project->tasks->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover shadow-sm">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->tasks as $task)
                        <tr>
                            <td class="fw-bold">{{ $task->title }}</td>
                            <td>
                                <span class="badge bg-{{ $task->status == 'Completed' ? 'success' : ($task->status == 'In Progress' ? 'warning' : 'secondary') }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this task?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-muted">No tasks assigned to this project.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('projects.index') }}" class="btn btn-secondary fw-bold shadow-sm">Back to Projects</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 900px;
        background: linear-gradient(135deg, #f8f9fa 40%, #e9ecef 100%);
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    h1 {
        font-size: 2rem;
        font-weight: 700;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table th {
        background: #343a40 !important;
        color: white !important;
    }

    .btn-sm {
        font-size: 0.875rem;
        padding: 6px 12px;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #545b62;
    }
</style>
@endsection
