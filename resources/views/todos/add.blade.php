@extends('home')
@section('title', 'ADD TODO')
@section('todo')
  <a href="{{ route('todo.index') }}" class="text-decoration-none text-dark fs-2 mb-5 d-block">Create Task</a>
  <form class="container py-5 h-100" method="POST" action="{{ route('todo.store') }}">
    @csrf
    <h1 class="fs-4 mb-4">{{ $add }}</h1>

    @if ($errors->any())
      <div class="alert alert-danger mb-4">
          <ul>
              @foreach ($errors->all() as $error)
                  <li class="mb-2">{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <div class="mb-3">
      <label  class="form-label">Title</label>
      <input type="text" name="title" class="form-control" />
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control"  name="description" cols="5" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

