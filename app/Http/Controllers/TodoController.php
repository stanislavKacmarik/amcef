<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Models\TodoCategory;
use App\Services\TodoService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function __construct(private readonly TodoService $todoService)
    {
        $this->authorizeResource(Todo::class, 'todo');
    }

    public function create(): View
    {
        $categories = TodoCategory::all();
        return view('todo.create', compact('categories'));
    }

    public function store(StoreTodoRequest $request): RedirectResponse
    {
        $this->todoService->store(
            $request->validated(),
            auth()->id()
        );
        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo created!');
    }

    public function edit(Todo $todo): View
    {
        $categories = TodoCategory::all();

        return view(
            'todo.edit',
            compact('todo', 'categories')
        );
    }

    public function update(UpdateTodoRequest $request, Todo $todo): RedirectResponse
    {
        $this->todoService->update(
            $todo,
            $request->validated(),
        );

        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo updated!');
    }

    public function destroy(Todo $todo): RedirectResponse
    {
        $this->todoService->delete($todo);
        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo updated!');
    }

    /**
     * @throws AuthorizationException
     */
    public function restore(int $id): RedirectResponse
    {
        $trashedTodo = Todo::onlyTrashed()->where('id', $id)->first();
        $this->authorize('restore', $trashedTodo);
        $this->todoService->restore($trashedTodo);
        return redirect()
            ->route('todo.index')
            ->with('alert', 'Todo restored!');
    }
}
