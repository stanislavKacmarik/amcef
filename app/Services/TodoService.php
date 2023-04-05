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

    /**
     * @param Todo $todo
     * @param mixed $validated
     * @return void
     */
    public function update(Todo $todo, mixed $validated)
    {
        $todo = $todo->fill($validated);
        $todo->save();
    }
}