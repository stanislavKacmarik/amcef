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
                        <th>Description</th>
                        <th>Category</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($todos as $todo)
                        <livewire:todo.table-row :todo="$todo" :wire:key="$todo->id">
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>