@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="container my-5 shadow-lg p-4 rounded bg-white">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2 class="text-center mb-4 text-primary">User Details</h2>

    <div class="text-center mb-4">
        <div class="avatar-container mb-3">
            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}" 
                alt="User Avatar" class="rounded-circle img-fluid border shadow" 
                style="width: 150px; height: 150px; object-fit: cover;">
        </div>
    </div>

    <div class="text-center mb-4">
        <p class="fw-bold text-dark">Name: <span class="text-muted">{{ $user->name }}</span></p>
        <p class="fw-bold text-dark">Email: <span class="text-muted">{{ $user->email }}</span></p>
        <p class="fw-bold text-dark">Phone No: <span class="text-muted">{{ $user->phone }}</span></p>

        <p class="fw-bold text-dark">Projects: 
            @if($user->projects->isNotEmpty()) 
                @foreach($user->projects as $project)
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm fw-bold shadow-sm m-1">
                        {{ $project->name }}
                    </a>
                @endforeach
            @else
                <span class="text-danger fw-bold">No Projects Assigned</span>
            @endif
        </p>
    </div>

    <div class="text-center">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-lg fw-bold shadow-sm">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-lg fw-bold shadow-sm">Back</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 800px;
        background: linear-gradient(135deg, #f8f9fa 40%, #e9ecef 100%);
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    h2 {
        color: #343a40;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .avatar-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text-muted {
        font-size: 1.1rem;
        color: #495057 !important;
    }

    .btn-lg {
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    .btn-warning {
        background: #ffca2c;
        border: none;
        color: #212529;
    }

    .btn-warning:hover {
        background: #e0a800;
        color: #fff;
    }

    .btn-secondary {
        background: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background: #545b62;
    }
</style>
@endsection
