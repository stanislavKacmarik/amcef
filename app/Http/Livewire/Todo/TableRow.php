<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;

class TableRow extends Component
{
    public Todo $todo;

    public function render()
    {
        return view('livewire.todo.table-row');
    }
}
