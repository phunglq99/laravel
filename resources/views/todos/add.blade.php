@extends('home')
@section('title', 'ADD TODO')
@section('todo')
    <a href="{{ route('todo.index') }}" class="text-decoration-none text-dark fs-2 mb-5 d-block">Create Task</a>
    <form class="container py-5 h-100" method="POST" action="{{ route('todo.store') }}">
        @csrf
        <h1 class="fs-4 mb-4">{{ $add }}</h1>

        <div class="mb-3">
            <label class="form-label">Title</label>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="title" class="form-control" />
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" name="description" cols="5" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            @error('is_complete')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select class="form-select" name="is_complete">
                <option selected disabled> Open this select menu </option>
                <option value="0"> In Complete </option>
                <option value="1"> Complete </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
