@extends('layouts.main')

@section('content')
    <h2>Halaman Edit Posts</h2>

    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="col-md-8">
            <input type="text" name="judul" class="form-control" value="{{ $post->judul }}">
            <br>
            <input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
            <br>
            <textarea name="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>

            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    
@endsection