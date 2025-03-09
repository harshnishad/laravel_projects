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

        <!-- Name Input Field -->
        <div class="mb-3">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email Input Field -->
        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Avatar Upload Field -->
        <div class="mb-3">
            <label>Avatar</label>
            <input type="file" class="form-control" name="avatar" accept="image/*">
            
            <!-- Display current avatar -->
            @if($user->avatar)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Current Avatar" width="100" height="100" class="rounded-circle">
                    <p class="mt-2">Current Avatar</p>
                </div>
            @else
                <p class="mt-2">No avatar set</p>
            @endif
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
