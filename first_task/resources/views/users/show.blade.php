@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="container my-5">
    <!-- Success message alert -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="text-center mb-4">User Details</h2>

    <!-- Avatar Section -->
    <div class="text-center mb-4">
        <div class="avatar-container mb-3">
            @if($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            @endif
        </div>
    </div>

    <!-- User Information -->
    <div class="text-center mb-4">
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Phone No:</strong> {{ $user->phone }}</p>
        
    </div>

    <!-- Action Buttons -->
    <div class="text-center">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-lg">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg">Back</a>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
            font-weight: bold;
        }

        .avatar-container {
            margin-bottom: 20px;
        }

        .user-info p {
            font-size: 1.2rem;
            color: #555;
        }

        .user-info strong {
            color: #333;
        }

        .btn-lg {
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
@endsection
