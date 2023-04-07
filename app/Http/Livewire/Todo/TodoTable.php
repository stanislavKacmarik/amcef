<?php

namespace App\Http\Livewire\Todo;

use App\Models\TodoCategory;
use App\Repository\TodoRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class TodoTable extends Component
{

    use WithPagination;

    /**
     * @var Collection<TodoCategory>
     */
    public Collection $categories;

    // filters
    public string $category_id = '';
    public string $status = '';
    // all, only_shared, only_mine
    public string $visibility = 'all';
    public string $deleted = '';

    protected $paginationTheme = 'bootstrap';
    private TodoRepository $todoRepository;

    public function boot(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function mount()
    {
        $this->categories = TodoCategory::all();
    }

    public function updated()
    {
        $this->categories = TodoCategory::all();
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.todo.table', [
                'todos' => $this->getTodos()
            ]
        )->layout('layouts.app');
    }

    private function getTodos(): LengthAwarePaginator
    {
        return $this->todoRepository->getWithAdvancedFilter([
                'category_id' => $this->category_id,
                'status' => $this->status,
                'visibility' => $this->visibility,
                'deleted' => $this->deleted
            ],
            auth()->id()
        );
    }
}
