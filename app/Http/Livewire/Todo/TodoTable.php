<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class TodoTable extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /**
     * @var Collection<TodoCategory>
     */
    public Collection $categories;

    public string $category_id = '';

    public string $status = '';


    public function mount()
    {
        $this->categories = TodoCategory::all();
    }

    public function updated()
    {
        $this->categories = TodoCategory::all();
        $this->resetPage();
    }

    public function render()
    {
        return view(
            'livewire.todo.table',
            ['todos' => $this->getTodos()]
        )
            ->layout('layouts.app');
    }

    private function getTodos(): LengthAwarePaginator
    {
        return Todo::with('category')
            ->when($this->category_id, function ($q) {
                return $q->where('category_id', $this->category_id);
            })
            ->when($this->status, function ($q) {
                return $q->where('status', $this->status);
            })
            ->paginate(10);
    }
}
