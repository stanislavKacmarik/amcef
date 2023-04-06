<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
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
    public string $category_id = '';
    public string $status = '';

    // all, only_shared, only_mine
    public string $visibility = 'all';

    protected $paginationTheme = 'bootstrap';

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
            ->when($this->category_id, function (Builder $q) {
                return $q->where('category_id', $this->category_id);
            })
            ->when($this->status, function (Builder $q) {
                return $q->where('status', $this->status);
            })
            ->when($this->visibility == 'only_mine', function ($q) {
                return $q->where('author_id', auth()->id());
            })
            ->when($this->visibility == 'only_shared', function ($q) {
                return $q->whereHas('sharedUsers');
            })
            ->when($this->visibility == 'all', function ($q) {
                return $q->whereHas('sharedUsers')
                    ->orWhere('author_id', auth()->id());
            })
            ->paginate(10);
    }
}
