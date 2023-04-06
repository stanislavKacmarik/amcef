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
    <td>{{$todo->category->title}}</td>
    <td>
        <a href="{{route('todo.edit', ['todo' => $todo->id])}}">
            <i class="bi bi-pencil-square"></i>
        </a>
    </td>
</tr>