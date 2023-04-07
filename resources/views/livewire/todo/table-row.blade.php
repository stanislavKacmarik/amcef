<tr>
    <td>{{$todo->name}}</td>
    <td class="text-center">
        @if($todo->status === \App\TodoStatusEnum::Done)
            <i class="bi bi-check2-circle text-success fs-3" title="done"></i>
        @else
            <i class="bi bi-circle-half text-warning fs-4" title="pending"></i>
        @endif
    </td>
    <td>{{$todo->description}}</td>
    <td>{{$todo->author->id === Auth::user()->id ? 'you' : $todo->author->email }}</td>
    <td>{{$todo->category->title}}</td>
    <td>
        <a href="{{route('todo.edit', ['todo' => $todo->id])}}" class="bi bi-pencil-square"></a>
        <i class="bi bi-trash text-danger"
                data-bs-toggle="modal"
                data-bs-target="#deleteConfirmModal"
                data-todo-id="{{$todo->id}}"
                data-todo-name="{{$todo->name}}">
        </i>
    </td>
</tr>