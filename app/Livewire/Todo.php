<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo as TodoModel;

class Todo extends Component
{
    use WithPagination;

    #[Layout('components.layouts.app-todo')]
    public $name;
    public $nameEdit;
    public $editId;

    public function add()
    {
        $this->validate([
            'name' => 'required|min:5'
        ]);
        TodoModel::create([
            'name' => $this->name,
            'user_id' => Auth::id(),
        ]);
        $this->reset('name');

        $this->resetPage('todoPage');
    }

    public function check($id)
    {
        $todo = TodoModel::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $todo->update([
            'todo_check' => true,
        ]);
    }

    public function uncheck($id)
    {
        $todo = TodoModel::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $todo->update([
            'todo_check' => false,
        ]);
    }

    public function edit($id)
    {
        $todo = TodoModel::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $this->nameEdit = $todo->name;
        $this->editId = $id;
    }

    public function cancelEdit()
    {
        $this->reset(['nameEdit', 'editId']);
    }

    public function update()
    {
        $this->validate([
            'nameEdit' => 'required|min:5'
        ]);

        $todo = TodoModel::where('id', $this->editId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $todo->update([
            'name' => $this->nameEdit,
        ]);

        $this->reset(['nameEdit', 'editId']);
    }

    public function delete($id)
    {
        $todo = TodoModel::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $todo->delete();
    }

    public function clear()
    {
        TodoModel::where('user_id', Auth::id())
            ->where('todo_check', false)
            ->delete();

        $this->resetPage('todoPage');
    }

    public function render()
    {
        $userId = Auth::id();

        $todo = TodoModel::select('id', 'name', 'user_id', 'todo_check', 'created_at')
            ->where('user_id', $userId)
            ->where('todo_check', false)
            ->latest()
            ->paginate(5, ['*'], 'todoPage');

        $todoCheck = TodoModel::select('id', 'name', 'user_id', 'todo_check', 'created_at')
            ->where('user_id', $userId)
            ->where('todo_check', true)
            ->latest()
            ->paginate(5, ['*'], 'todoCheckPage');

        return view('livewire.todo', [
            'title' => 'MyTodo',
            'todo' => $todo,
            'todoCheck' => $todoCheck
        ]);
    }
}
