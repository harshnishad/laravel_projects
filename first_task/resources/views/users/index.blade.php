@extends('layouts.app')

@section('title', 'Users List')

@section('content')
<div class="container my-5">
    <!-- Success message alert -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Title Section -->
    <h2 class="text-center mb-4">Users List</h2>

    <!-- Search Form -->
    <form class="d-flex mb-4" method="GET" action="{{ route('users.index') }}">
        <input class="form-control me-2" type="search" name="search" placeholder="Search by name" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <!-- Sort By Name Form -->
    <div class="mb-4">
        <a href="{{ route('users.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}" class="btn btn-info btn-sm">
            Sort by Name ({{ request('sort_order') === 'asc' ? 'Ascending' : 'Descending' }})
        </a>
    </div>

    <!-- Create User Button -->
    <div class="text-end mb-4">
        <a href="{{ route('users.create') }}" class="btn btn-success btn-lg">Create User</a>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <!-- Avatar Image -->
                    <td>
                        @if($user->avatar)
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar" width="50" height="50" class="rounded-circle">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" width="50" height="50" class="rounded-circle">
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                        data-userid="{{ $user->id }}">
                        Delete
                    </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript to Handle Modal --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var userId = button.getAttribute('data-userid'); // Extract user ID

            var form = document.getElementById('deleteForm');
            form.action = '/users/' + userId; // Update form action dynamically
        });
    });
</script>

@endsection
