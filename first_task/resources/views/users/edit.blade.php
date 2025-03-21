@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container my-5">
    <h2>Edit User</h2>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Display Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit User Form -->
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <!-- Name Input Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $user->name) }}" required placeholder="Enter your name">
                </div>
            </div>

            <!-- Phone Input Field -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone No</label>
                    <input type="text" name="phone" class="form-control" id="phone" 
                           value="{{ old('phone', $user->phone) }}" pattern="[0-9]{10}" maxlength="10" 
                           placeholder="Enter your phone number">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <!-- Email Input Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="{{ old('email', $user->email) }}" required placeholder="Enter your email">
            </div>
        </div>

        <div class="mb-3">
            <!-- Avatar Upload Field -->
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">

                <!-- Display current avatar -->
                @if($user->avatar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $user->avatar) }}" 
                             alt="Current Avatar" width="100" height="100" class="rounded-circle">
                        <p class="mt-2">Current Avatar</p>
                    </div>
                @else
                    <p class="mt-2">No avatar set</p>
                @endif
            </div>
        </div>

        <!-- Check if projects exist before displaying dropdown -->
        @if(isset($projects) && count($projects) > 0)
            <!-- Project Multi-Select Dropdown -->
            <div class="mb-3">
                <div class="form-group">
                    <label for="project_ids">Projects</label>
                    <select name="project_ids[]" id="project_ids" class="form-control" multiple>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" 
                                {{ in_array($project->id, old('project_ids', $user->projects->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        @endif

        <!-- Update Button -->
        <button type="submit" class="btn btn-primary btn-lg">Update</button>
    </form>
</div>
@endsection
