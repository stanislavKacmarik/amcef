<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use App\Models\TodoCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
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
    public string $category_id = '';
    public string $status = '';

    // all, only_shared, only_mine
    public string $visibility = 'all';

    public string $deleted = '';

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

    public function render(): View
    {
        return view('livewire.todo.table', [
                'todos' => $this->getTodos()
            ]
        )->layout('layouts.app');
    }

    private function getTodos(): LengthAwarePaginator
    {
        return Todo::with(['category', 'author'])
            ->when($this->category_id, function (Builder $q) {
                return $q->where('category_id', $this->category_id);
            })
            ->when($this->status, function (Builder $q) {
                return $q->where('status', $this->status);
            })
            ->when($this->visibility == 'only_mine', function (Builder $q) {
                return $q->where('author_id', auth()->id());
            })
            ->when($this->visibility == 'only_shared', function (Builder $q) {
                return $q->whereHas('sharedUsers', function (Builder $q) {
                    $q->where('users.id', auth()->id());
                });
            })
            ->when($this->visibility == 'all', function (Builder $q) {
                return $q->where(function (Builder $q) {
                    $q->whereHas('sharedUsers', function (Builder $q) {
                        $q->where('users.id', auth()->id());
                    })->orWhere('author_id', auth()->id());
                });
            })
            ->orderBy('updated_at', 'DESC')
            ->when($this->deleted, function (Builder $q) {
                $q->withTrashed();
            })
            ->paginate(10);
    }
}
