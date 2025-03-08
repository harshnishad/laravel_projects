@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container text-center mt-5">
        <h1>Welcome to Laravel</h1>
        <a href="{{ route('users.index') }}" class="btn btn-primary mt-3">View Users</a>
    </div>
@endsection
