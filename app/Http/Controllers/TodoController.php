<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
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

    public function edit($id) {
        return $id;
        // return view('todos.edit');
    }

    public function store(Request $req) {
        $req->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min:5', 'max:500'],
        ]);

       Todo::create([
            'title' => $req->title,
            'description' => $req->description,
            'is_complete' => 0,
       ]);

    //    $req->session()->flashMessage('alert-suscess','Todo Created Successfully');
       return redirect('todo')->with('success', 'Todo created successfully!');
    }

    public function show($id) {

        $todoShow = Todo::find($id);

        if(! $todoShow) {
            return redirect('todo')->withErrors([
                'error' => 'Invalid todo task'
            ]);
        }
        // return $id   //test
        return view('todos.show', [
            'todoShow' => $todoShow
        ]);
    }
}