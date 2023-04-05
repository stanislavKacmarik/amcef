@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('todo.update', ['todo' => $todo->id ]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name"
                               id="name"
                               value="{{$todo->name}}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Short title">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Content</label>
                        <textarea name="description" class="form-control" id="description"
                                  placeholder="Detailed content"
                        >{{ (old('description') ?? $todo?->description)   ?? ''}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
