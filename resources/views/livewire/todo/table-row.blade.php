<tr>
    <td>{{$todo->name}}</td>
    <td>{{$todo->description}}</td>
    <td>{{$todo->category->title}}</td>
    <td>
        <a href="{{route('todo.edit', ['todo' => $todo->id])}}">
            <i class="bi bi-pencil-square"></i>
        </a>
    </td>
</tr>