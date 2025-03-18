@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create User</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            <small class="text-muted">Name must contain at least two words and only "_" and space are allowed.</small>
        </div>

        <div class="mb-3">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required pattern="[0-9]{10}" maxlength="10">
            <small class="text-muted">Phone number must be exactly 10 digits.</small>
        </div>

        <div class="mb-3">
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
        </div>

        <div class="mb-3">
            <label for="avatar">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
        </div>

        <div class="mb-3">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">Select a project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection