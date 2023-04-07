@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('todo.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name"
                               id="name"
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
                                  placeholder="Detailed content">{{ old('description') ?? ''}}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Category</label>
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            @foreach($categories as $category)
                                <option
                                        value="{{$category->id}}"
                                        @selected(old('category_id') == $category->id)
                                >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    @include('todo.share-input')
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
