<?php

namespace App\Http\Controllers;

// use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {

        $todos = Todo::paginate(10);
        // $todosAll = Todo::All();

        return view('todos.todo', [
            'todos' => $todos,
        ]);
    }

    public function add() {

        $addTodo = 'Add Todo';

        return view('todos.add', [
            'add' => $addTodo
        ]);
    }

    public function store(Request $req) {
        $req->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min:5', 'max:500'],
            'is_complete' => ['required']
        ]);

       Todo::create([
            'title' => $req->title,
            'description' => $req->description,
            'is_complete' => $req->is_complete,
       ]);

    //    $req->session()->flashMessage('alert-suscess','Todo Created Successfully');
       return redirect('todo')->with('success', 'Todo created successfully!');
    }

    public function showErr() {
        return redirect('todo')->withErrors([
            'error' => 'Invalid todo task'
        ]);
    }

    public function show($id) {

        $todoShow = Todo::find($id);

        if(! $todoShow) {
            return $this->showErr();
        }
        // return $id   //test
        return view('todos.show', [
            'todoShow' => $todoShow
        ]);
    }

    public function edit($id) {
        $todoEdit = Todo::find($id);

        if(! $todoEdit) {
            return $this->showErr();
        }
        // return $id   //test
        return view('todos.edit', [
            'todoEdit' => $todoEdit
        ]);
    }

    public function update(Request $req) {
        $req->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min:5', 'max:500'],
        ]);

        $todoUpdate = Todo::find($req->todo_id);

        //Bắt lỗi khi không update dữ liệu
        if (!$todoUpdate->isDirty()) {
            return redirect()->back()->withErrors([
                'error' => 'No data changes'
            ]);
        }

        if(! $todoUpdate) {
            return $this->showErr();
        }

        $todoUpdate->update([
            'title' => $req->title,
            'description' => $req->description,
            'is_complete' => $req->is_complete
        ]);

        return redirect('todo')->with('success', 'Todo update successfully!');
    }

    public function delete(Request $req) {
        $todoDelete = Todo::find($req->todo_id);

        if(! $todoDelete) {
            return $this->showErr();
        }

        $todoDelete->delete();

        return redirect('todo')->with('success', 'Todo delete successfully!');
    }
}
