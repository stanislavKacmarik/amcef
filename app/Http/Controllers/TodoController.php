<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Models\TodoCategory;
use App\Services\TodoService;

class TodoController extends Controller
{
    public function __construct(private TodoService $todoService)
    {
        $this->authorizeResource(Todo::class, 'todo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TodoCategory::all();
        return view('todo.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $this->todoService->store(
            $request->validated(),
            auth()->id()
        );
        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $categories = TodoCategory::all();

        return view(
            'todo.edit',
            compact('todo', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $this->todoService->update(
            $todo,
            $request->validated(),
        );

        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $this->todoService->delete($todo);
        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo updated!');

    }
}
