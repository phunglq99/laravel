@extends('home')
@section('title', 'TODO')
@section('todo')

    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-12 col-xl-12">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <a href="{{ route('todo.index') }}" class="d-block text-center my-3 pb-3 fw-bold fs-3 text-decoration-none">TO DO APP</a>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('todo.add') }}" class="btn btn-secondary">Create tasks</a>
                                <form class="d-flex" action="{{ route('todo.index') }}" method="get">
                                    <input class="form-control me-2" name="searchTerm" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                  </form>
                            </div>
                            {{-- Alert success --}}
                            @if (session('success'))
                                <div class="todo alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Alert error --}}
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
                                    <!-- Hiển thị kết quả tìm kiếm (nếu có) -->
                                    @if ($todoSearchTerm)
                                            <h2>Kết quả tìm kiếm cho: "{{ $todoSearchTerm }}"</h2>
                                            <ul>
                                                @foreach ($todoSearch as $todo)
                                                <tr>
                                                    <th scope="row">{{ $todo->id }}</th>
                                                    <td>{{ $todo->title }}</td>
                                                    <td> {{ $todo->description }} </td>
                                                    <td>
                                                        @if ($todo->is_complete == 1)
                                                            <a href="#" class="btn btn-success px-4">Complete</a>
                                                        @else
                                                            <a href="#" class="btn btn-danger px-3">In Complete</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('todo.show', $todo->id) }}"
                                                            class="btn btn-outline-warning me-3">View</a>
                                                        <a href="{{ route('todo.edit', $todo->id) }}"
                                                            class="btn btn-outline-info me-2">Edit</a>
                                                        <form id="deleteform" action="{{ route('todo.delete') }}"
                                                            class="d-inline-block" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-outline-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $todo->id }}">Delete</button>
                                                            <div class="modal fade" id="delete{{ $todo->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">New
                                                                                message</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="recipient-name"
                                                                                    class="col-form-label">Are you sure you want to delete the data?
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <input type="hidden" name="todo_id"
                                                                                class="btn btn-outline-success ms-1"
                                                                                value="{{ $todo->id }}" />
                                                                            <input type="submit"
                                                                                class="btn btn-outline-danger ms-1"
                                                                                value="Delete" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </ul>
                                        <div class="position-absolute bottom-0 start-0 end-0 px-4 py-3">
                                            {{ $todoSearch->links('pagination::bootstrap-5') }}
                                        </div>
                                    @else
                                            @if (count($todos) > 0)
                                                @foreach ($todos as $todo)
                                                    <tr>
                                                        <th scope="row">{{ $todo->id }}</th>
                                                        <td>{{ $todo->title }}</td>
                                                        <td> {{ $todo->description }} </td>
                                                        <td>
                                                            @if ($todo->is_complete == 1)
                                                                <a href="#" class="btn btn-success px-4">Complete</a>
                                                            @else
                                                                <a href="#" class="btn btn-danger px-3">In Complete</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('todo.show', $todo->id) }}"
                                                                class="btn btn-outline-warning me-3">View</a>
                                                            <a href="{{ route('todo.edit', $todo->id) }}"
                                                                class="btn btn-outline-info me-2">Edit</a>
                                                            <form id="deleteform" action="{{ route('todo.delete') }}"
                                                                class="d-inline-block" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#delete{{ $todo->id }}">Delete</button>
                                                                <div class="modal fade" id="delete{{ $todo->id }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">New
                                                                                    message</h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="recipient-name"
                                                                                        class="col-form-label">Are you sure you want to delete the data?
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <input type="hidden" name="todo_id"
                                                                                    class="btn btn-outline-success ms-1"
                                                                                    value="{{ $todo->id }}" />
                                                                                <input type="submit"
                                                                                    class="btn btn-outline-danger ms-1"
                                                                                    value="Delete" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                No task
                                            @endif
                                        <div class="position-absolute bottom-0 start-0 end-0 px-4 py-3">
                                            {{ $todos->links('pagination::bootstrap-5') }}
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
