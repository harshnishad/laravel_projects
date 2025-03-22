@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="container my-5 shadow-lg p-4 rounded bg-light">
    <h1 class="mb-4 text-center text-primary fw-bold">{{ $project->name }}</h1>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title text-secondary">Project Details</h5>
            <p class="text-muted"><strong>Description:</strong> {{ $project->description }}</p>
        </div>
    </div>

    <hr>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark">Tasks</h3>
        <a href="{{ route('tasks.create', ['project' => $project->id]) }}" class="btn btn-success fw-bold shadow-sm">
            <i class="bi bi-plus-circle"></i> Add Task
        </a>
    </div>

    @if ($project->tasks->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->tasks as $task)
                        <tr class="task-row" data-task-id="{{ $task->id }}">
                            <td class="fw-bold">{{ $task->title }}</td>
                            <td>
                                <span class="badge bg-{{ $task->status == 'Completed' ? 'success' : ($task->status == 'In Progress' ? 'warning' : 'secondary') }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this task?');">
                                        <i class="bi bi-trash-fill"></i> Delete
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

    <hr>

    <div class="mb-4">
        <h3 class="text-dark">Assigned Users</h3>
        @if ($project->users->count() > 0)
            <ul class="list-group">
                @foreach ($project->users as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none text-dark">
                            {{ $user->name }} ({{ $user->email }})
                        </a>
                        <span class="badge bg-primary rounded-pill">{{ $user->role }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center text-muted">No users assigned to this project.</p>
        @endif
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('projects.index') }}" class="btn btn-secondary fw-bold shadow-sm">
            <i class="bi bi-arrow-left-circle-fill"></i> Back to Projects
        </a>
    </div>
</div>

@section('scripts')
<script>
    // Add animation to task rows on hover
    document.querySelectorAll('.task-row').forEach(row => {
        row.addEventListener('mouseenter', () => {
            row.classList.add('table-active');
        });
        row.addEventListener('mouseleave', () => {
            row.classList.remove('table-active });
    });
</script>
@endsection
@endsection