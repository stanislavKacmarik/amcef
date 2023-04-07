<?php

namespace App\Services;

use App\Models\Todo;
use App\Models\User;
use Arr;
use Illuminate\Support\Collection;

class TodoService
{


    public function __construct(private readonly MailService $mailService)
    {
    }

    public function store(mixed $validated, int $id): void
    {
        $todo = Todo::make($validated);
        $todo->author_id = $id;
        $todo->save();
        $newEmails = $this->syncShared($todo, $validated);
        $this->mailService->sendTodoShareEmails($newEmails, $todo);
    }

    private function syncShared($todo, $validated): array
    {
        $emails = isset($validated['share']) ?
            Arr::pluck($validated['share'], 'email') :
            [];
        $oldEmails = $todo->sharedUsers()->pluck('email');

        $newEmails = Collection::make($emails)->diff($oldEmails)->unique();
        $todo->sharedUsers()->sync(
            User::select('id')->whereIn('email', $emails)->get()
        );
        return $newEmails->toArray();
    }

    /**
     * @param Todo $todo
     * @param mixed $validated
     * @return void
     */
    public function update(Todo $todo, mixed $validated): void
    {
        $todo = $todo->fill($validated);
        $todo->save();
        $newEmails = $this->syncShared($todo, $validated);

        $this->mailService->sendTodoShareEmails($newEmails, $todo);
    }

    public function delete(Todo $todo): void
    {
        $todo->delete();
    }

    public function restore(Todo $todo): void
    {
        $todo->restore();
    }
}