<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TodoTable extends Component
{

    /**
     * @var Collection<Todo>
     */
    public Collection $todos;

    public function mount()
    {
        $this->todos = Todo::with('category')->get();
    }

    public function render()
    {
        return view('livewire.todo.table')
            ->layout('layouts.app');
    }
}
