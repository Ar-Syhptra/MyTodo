<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        $todo = Todo::where('todo_check', false)->get();
        $check = Todo::where('todo_check', true)->get();

        return view('todo', ['title' => 'MyTodo', 'todo' => $todo, 'todoCheck' => $check]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        Todo::create([
            'name' => $data['name']
        ]);

        return redirect()->route('todo');
    }

    public function check($id)
    {

        $data = Todo::findOrFail($id);
        $data->update([
            'todo_check' => true,
        ]);

        return redirect()->route('todo');
    }

    public function uncheck($id)
    {
        $data = Todo::findOrFail($id);
        $data->update([
            'todo_check' => false,
        ]);

        return redirect()->route('todo');
    }

    public function delete($id)
    {
        $data = Todo::findOrFail($id);
        $data->delete();

        return redirect()->route('todo');
    }

    public function clear()
    {
        Todo::where('todo_check', false)->delete();

        return redirect()->route('todo');
    }
}