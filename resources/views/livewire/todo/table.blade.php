<div>
    @if (session('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('alert')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModal"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="deleteConfirmModalTitle"> Are you sure, that you want to delete todo <b></b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('todo.index') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Owner</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>
                            <select wire:model="status" class="form-select" name="status" aria-label="All">
                                <option value="">All</option>
                                @foreach(\App\TodoStatusEnum::values() as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th></th>
                        <th>
                            <select wire:model="visibility" class="form-select" aria-label="All">
                                <option value="all">All</option>
                                <option value="only_shared">Only shared</option>
                                <option value="only_mine">Only mine</option>
                            </select>
                        </th>
                        <th>
                            <select wire:model="category_id" class="form-select" name="category_id" aria-label="All">
                                <option value="">All</option>
                                @foreach($categories as $category)
                                    <option
                                            value="{{$category->id}}"
                                            @selected(old('category_id') == $category->id)
                                    >{{$category->title}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($todos as $todo)
                        <livewire:todo.table-row :todo="$todo" :wire:key="$todo->id">
                    @endforeach
                    </tbody>
                </table>
                <div class="todo-pagination">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        var deleteConfirmModal = document.getElementById('deleteConfirmModal')
        deleteConfirmModal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget
            const todoName = trigger.getAttribute('data-todo-name');
            const todoId = trigger.getAttribute('data-todo-id');
            const modalTitleBold = deleteConfirmModal.querySelector('.modal-title b');
            const form = deleteConfirmModal.querySelector('form');
            modalTitleBold.textContent = todoName;
            form.action = form.action + '/' + todoId;
        })
    </script>
@endpush