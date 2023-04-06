<div>

    @if (session('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('alert')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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