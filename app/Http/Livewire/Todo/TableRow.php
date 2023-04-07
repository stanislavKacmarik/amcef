<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TableRow extends Component
{
    public Todo $todo;

    public function render(): View
    {
        return view('livewire.todo.table-row');
    }
}
