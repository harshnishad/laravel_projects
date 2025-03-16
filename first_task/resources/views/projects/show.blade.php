@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $project->name }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Details</h5>
                <p><strong>Description:</strong> {{ $project->description }}</p>
            </div>
        </div>

        <hr>

        <h3>Tasks</h3>
        <a href="{{ route('tasks.create', ['project' => $project->id]) }}" class="btn btn-primary mb-3">Add Task</a>

        @if ($project->tasks->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
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
        @else
            <p>No tasks assigned to this project.</p>
        @endif

        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
    </div>
@endsection
