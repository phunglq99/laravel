<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->get('searchTerm');

        $todos = Todo::when( $searchTerm, function($query, $searchTerm) {
            return $query->where('title', 'like', '%' .  $searchTerm . '%');
        }) -> paginate(10);

        $todos->appends(['searchTerm' => $searchTerm]);

        return view('todos.todo', [
            'todos' => $todos,
            'searchTerm' => $searchTerm
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addTodo = 'Add Todo';

        return view('todos.add', [
            'add' => $addTodo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min:5', 'max:500'],
            'is_complete' => ['required']
        ]);

       Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'is_complete' => $request->is_complete,
       ]);

    //    $req->session()->flashMessage('alert-suscess','Todo Created Successfully');
       return redirect('todos')->with('success', 'Todo created successfully!');
    }

    public function showErr() {
        return redirect('todo')->withErrors([
            'error' => 'Invalid todo task'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todoShow = Todo::find($id);

        if(! $todoShow) {
            return $this->showErr();
        }
        // return $id   //test
        return view('todos.show', [
            'todoShow' => $todoShow
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todoEdit = Todo::find($id);

        if(! $todoEdit) {
            return $this->showErr();
        }
        // return $id   //test
        return view('todos.edit', [
            'todoEdit' => $todoEdit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string', 'min:5', 'max:500'],
        ]);

        $todoUpdate = Todo::find($request->todo_id);

        //Bắt lỗi khi không update dữ liệu
        if ($todoUpdate->title == $request->input('title') && $todoUpdate->description == $request->input('description') && $todoUpdate->is_complete == (int)$request->input('is_complete')) {
            return redirect()->back()->withErrors([
                'error' => 'No data changes'
            ]);
        }

        if(! $todoUpdate) {
            return $this->showErr();
        }

        $todoUpdate->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_complete' => $request->is_complete
        ]);

        return redirect('todos')->with('success', 'Todo update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::destroy($id);
        return redirect('todos')->with('success', 'Todo delete successfully!');
    }
}
