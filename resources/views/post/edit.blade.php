@extends('layouts.main')

@section('content')    
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="col-8">

            <div class="col-md-5">
                <input type="text" name="judul" class="form-control" value="{{ $post->judul }}">
            </div>

            <div class="col-md-5 mt-2">
                <input type="text" name="slug" class="form-control" value="{{ $post->slug }}">
            </div>

            <div class="col-md-3 mt-2">
                <select class="form-control" name="categories_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $row)
                    @if ($row->id == $post->categories_id)
                        <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                    @else
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="col-md-5 mt-2">
                <img src="{{ asset('image/'. $post->image) }}" class="img mb-2" width="200" alt="">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-5 mt-2">
                <textarea name="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
            </div>

            <div class="col-md-5 mt-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('post.index') }}" type="submit" class="btn btn-secondary">Close</a>
            </div>
        </div>
    </form>
        </div>
@endsection