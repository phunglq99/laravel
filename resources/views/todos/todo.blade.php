@extends('home')
@section('title', 'TODO')
@section('todo')
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-lg-12 col-xl-12">
              <div class="card rounded-3">
                <div class="card-body p-4">
      
                  <h3 class="text-center my-3 pb-3 fw-bold fs-3">TO DO APP</h3>
                  <a href="{{ route('todo.add') }}" class="btn btn-secondary">Create tasks</a>

                  @if (session('success'))
                    <div class="todo alert alert-success" role="alert">
                      {{ session('success') }}
                    </div>
                  @endif

                  @if ($errors->any())
                    <div class="todo alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                   @endif

                  <table class="table table-striped table-hover my-4">
                    <thead class="border-bottom border-dark">
                      <tr class="fw-bold">
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Complete</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($todos) > 0)
                        @foreach($todos as $todo)
                          <tr>
                            <th scope="row">{{ $todo->id }}</th>
                            <td>{{ $todo->title }}</td>
                            <td> {{ $todo->description }} </td>
                            <td> 
                                @if( $todo->is_complete == 1)
                                    <a href="#" class="btn btn-success">Complete</a>
                                @else
                                    <a href="#" class="btn btn-danger">In Complete</a>
                                @endif
                            </td>
                            <td>
                              <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-outline-warning me-3">View</a>
                              <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-outline-info me-2">Edit</a>
                              <form action="" class="d-inline-block" method="POST">
                                <input type="hidden" name= "todo_id" class="btn btn-outline-success ms-1" value="{{ $todo->id }}" />
                                <input type="submit" class="btn btn-outline-danger ms-1" value="Delete" />
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else
                          No task
                      @endif
                    </tbody>
                  </table>
                  <div class="d-block">
                    {{ $todos->links('pagination::bootstrap-5') }}
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

@endsection