@extends('layouts.main')

@section('content')    
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-8">

            <div class="col-md-5">
                <input type="text" name="judul" class="form-control" placeholder="Judul Postingan">
            </div>

            <div class="col-md-5 mt-2">
                <input type="text" name="slug" class="form-control" placeholder="Slug">
            </div>

            <div class="col-md-3 mt-2">
                <select class="form-control" name="categories_id">
                    <option value="">Pilih Kategori</option>
                    @foreach ($category as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-5 mt-2">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-5 mt-2">
                <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content"></textarea>
            </div>

            <div class="col-md-5 mt-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </form>
        </div>
@endsection