@extends('home')
@section('title', 'ADD TODO')
@section('todo')
    <a href="{{ route('todo.index') }}" class="text-decoration-none text-dark fs-2 mb-5 d-block">Todo</a>
    <form class="container py-5 h-100" action="{{ route('todo.update') }}" method="POST">
        @csrf
        @method('PUT')
        <h1 class="fs-4 mb-4">Edit Form</h1>

        <input type="hidden" name="todo_id" value="{{ $todoEdit->id }}">
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $todoEdit->title }}"/>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" cols="5" rows="5">{{ trim($todoEdit->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            <select class="form-select" name="is_complete">
                <option disabled selected>Select Option</option>
                <option value="0">In Complete</option>
                <option value="1">Complete</option>
              </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
