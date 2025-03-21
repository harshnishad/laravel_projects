@extends('layouts.app')

@section('content')
<div class="container my-5 shadow-lg p-4 rounded bg-white">
    <h2 class="text-primary text-center mb-4">Create User</h2>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Error Messages -->
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
            <label for="name" class="fw-bold">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" 
                required pattern="^[A-Za-z_ ]{3,}$"
                title="Name must contain at least three letters. Only letters, spaces, and underscores are allowed.">
            <small class="text-muted">Name must contain at least three letters. Only letters, spaces, and underscores are allowed.</small>
        </div>

        <div class="mb-3">
            <label for="email" class="fw-bold">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="fw-bold">Phone Number:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" 
                pattern="[0-9]{10}" maxlength="10"
                title="Phone number must be exactly 10 digits.">
            <small class="text-muted">Phone number must be exactly 10 digits.</small>
        </div>

        <div class="mb-3">
            <label for="password" class="fw-bold">Password:</label>
            <input type="password" id="password" class="form-control" name="password" required minlength="6"
                title="Password must be at least 6 characters long.">
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="fw-bold">Confirm Password:</label>
            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required minlength="6">
        </div>

        <div class="mb-3">
            <label for="avatar" class="fw-bold">Avatar:</label>
            <input type="file" id="avatar" name="avatar" class="form-control">
        </div>

        @if(isset($projects) && count($projects) > 0)
            <div class="mb-3">
                <label for="projects" class="fw-bold">Select Projects:</label>
               <select name="project_ids[]" id="project_ids" class="form-control" multiple>
    @foreach($projects as $project)
        <option value="{{ $project->id }}" 
            {{ in_array($project->id, old('project_ids', []) ?? []) ? 'selected' : '' }}>
            {{ $project->name }}
        </option>
    @endforeach
</select>

                <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple projects.</small>
            </div>
        @endif

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
</div>
@endsection
