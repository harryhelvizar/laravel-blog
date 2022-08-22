@extends('layouts.main')

@section('content')
    <h2>Halaman Posts</h2>
    <a href="{{ route('post.create') }}" class="btn btn-primary">Tambah Post</a>

    <div class="row">
        @foreach ($post as $item)
        <div class="card mt-2 ml-2" style="width: 18rem;">
            <img src="{{asset('image/' . $item->image)}}" width="150" class="card-img-top">
            <div class="card-body">
            <h3 class="card-title"><strong>{{ $item->judul }}</strong></h3>
            <p class="card-text">{{ $item->content }}</p>
            <a href="#" class="btn btn-primary">Show</a>
            <a href="{{ route('post.edit', $item->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
        @endforeach
    </div>        
    
    {{-- <table class="table">
        <thead>
            <tr>
                <th>judul</th>
                <th>slug</th>
                <th>kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->categories_id }}</td>
                <td>
                    <a href="{{ route('post.edit', $item->id) }}" class="btn btn-primary">edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}


@endsection