<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class TodoTable extends Component
{

    /**
     * @var Collection<Todo>
     */
    public Collection $todos;

    /**
     * @var Collection<TodoCategory>
     */
    public Collection $categories;

    public string $category_id = '';

    public string $status = '';


    public function mount()
    {
        $this->categories = TodoCategory::all();
        $this->todos = Todo::with('category')->get();
    }

    public function updated()
    {
        $this->todos = Todo::with('category')
            ->when($this->category_id, function ($q) {
                return $q->where('category_id', $this->category_id);
            })
            ->when($this->status, function ($q) {
                return $q->where('status', $this->status);
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.todo.table')
            ->layout('layouts.app');
    }
}
