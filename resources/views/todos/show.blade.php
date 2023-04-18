@extends('home')
@section('title', 'TODO')
@section('todo')
    <section class="todo vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col col-lg-12 col-xl-12">
                    <div class="card rounded-3">
                        <div class="card-body p-4">

                            <h3 class="text-center my-3 pb-3 fw-bold fs-3">TO DO APP</h3>
                            <p class="mb-2"><b class="fw-bold">Title </b>: {{ $todoShow->title }}</p>
                            <p class="mb-2"><b class="fw-bold">Description </b>: {{ $todoShow->description }}</p>
                            <p class="mb-4"><b class="fw-bold">Complete </b>: {{ $todoShow->is_complete }}</p>

                            <a href="{{ url()->previous() }}" class="btn btn-primary d-inline-block">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
