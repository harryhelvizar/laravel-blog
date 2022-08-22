@extends('layouts.main')

@section('content')

    <div class="card">
        <div class="card-header">
        <strong>{{ $post->judul }}</strong>
        </div>
        <div class="card-body">
            <img src="{{ asset('image/'. $post->image) }}" class="card-img-top" style="width: 30%;">
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>


@endsection