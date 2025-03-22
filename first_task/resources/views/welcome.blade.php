@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container text-center mt-5 bg-light p-5 rounded">
        <h1 class="display-4 font-weight-bold text-primary">Welcome to Laravel</h1>
        <p class="lead text-secondary">Manage your users, projects, and tasks efficiently.</p>

        <div class="mt-5">
            <h2 class="font-weight-bold text-success">Our Workflow</h2>
            <p class="text-muted">Users are connected to projects, and each project can have multiple tasks. This structure allows for efficient management and tracking of work.</p>
        </div>

        <div class="mt-5">
            <h2 class="font-weight-bold text-success">How It Works</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-primary bg-white">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Users</h5>
                            <p class="card-text">Manage your team members and their roles within projects.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-secondary bg-white">
                        <div class="card-body">
                            <h5 class="card-title text-secondary">Projects</h5>
                            <p class="card-text">Create and manage projects, assign users, and track progress.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-success bg-white">
                        <div class="card-body">
                            <h5 class="card-title text-success">Tasks</h5>
                            <p class="card-text">Break down projects into manageable tasks and assign them to users.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2 class="font-weight-bold text-success">Get Started Today!</h2>
            <p class="text-muted">Join us in streamlining your project management. Click the buttons below to begin.</p>
            <a href="{{ route('users.index') }}" class="btn btn-lg btn-outline-primary">Start Managing Users</a>
            <a href="{{ route('projects.index') }}" class="btn btn-lg btn-outline-secondary">Start Managing Projects</a>
        </div>
    </div>
@endsection