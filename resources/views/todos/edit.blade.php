@vite('resources/sass/_todo.scss')
<a href="{{ route('todo.index') }}" class="text-decoration-none text-dark fs-2 mb-5 d-block">Todo</a>
<form class="container py-5 h-100">
  <h1 class="fs-4 mb-4">Edit Form</h1>
  <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" name="title" class="form-control" />
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control"  name="description" cols="5" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
