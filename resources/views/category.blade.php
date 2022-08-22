@extends('layouts.main')

@section('content')
    <h2>Halaman Category</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Category
    </button>
    
    <table class="table">
        <thead>
            <tr>
                <th>nama</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-primary">edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="modal" tabindex="-1" id="exampleModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    
                    <input type="text" name="name" class="form-control" placeholder="Input Nama Kategori">
                    <br>
                    <input type="text" name="description" class="form-control" placeholder="Input Deskripsi">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>


@endsection