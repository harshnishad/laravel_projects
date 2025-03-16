@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="container">
        <h1>Add Task to Project: {{ $project->name }}</h1>

        <form action="{{ route('tasks.store', ['project' => $project->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create Task</button>
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
