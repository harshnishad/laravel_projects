@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Project Name">
        <textarea name="description" class="form-control mt-2" placeholder="Project Description"></textarea>
        <button type="submit" class="btn btn-success mt-2">Create</button>
    </form>
@endsection
