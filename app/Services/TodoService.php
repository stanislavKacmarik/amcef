<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{


    public function store(mixed $validated, int $id): void
    {
        $todo = Todo::make($validated);
        $todo->author_id = $id;
        $todo->save();
    }
}