@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Status:</strong> 
        <span class="badge bg-{{ $task->status == 'Completed' ? 'success' : ($task->status == 'In Progress' ? 'warning' : 'secondary') }}">
            {{ $task->status }}
        </span>
    </p>

    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit Task</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this task?');">
            Delete Task
        </button>
    </form>

    <a href="{{ route('projects.show', $task->project_id) }}" class="btn btn-secondary mt-3">Back to Project</a>
</div>
@endsection
