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
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

    <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" required>
    </div>

    <div class="mb-3">
        <label for="avatar">Avatar:</label>
        <input type="file" id="avatar" name="avatar" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
