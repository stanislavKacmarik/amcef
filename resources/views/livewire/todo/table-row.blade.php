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
        @if($todo->trashed())
            <i class="bi bi-arrow-clockwise fs-4 text-warning cursor-pointer"
               data-bs-toggle="modal"
               data-bs-target="#restoreConfirmModal"
               data-todo-action="{{route('todo.restore',$todo->id)}}"
               data-todo-name="{{$todo->name}}">
            </i>
        @else
            <a href="{{route('todo.edit', ['todo' => $todo->id])}}" class="bi bi-pencil-square fs-5 "></a>
            <i class="bi bi-trash fs-5 text-danger cursor-pointer"
               data-bs-toggle="modal"
               data-bs-target="#deleteConfirmModal"
               data-todo-action="{{route('todo.destroy', ['todo' => $todo->id])}}"
               data-todo-name="{{$todo->name}}">
            </i>
        @endif
    </td>
</tr>