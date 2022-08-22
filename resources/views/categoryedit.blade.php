@extends('layouts.main')

@section('content')
    <h2>Edit Category</h2>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="">
            
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            
        </div>
        <div class="">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>


@endsection