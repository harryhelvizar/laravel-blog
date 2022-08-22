@extends('layouts.main')

@section('content')
    <h2>Halaman Product</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Product
    </button>

    {{-- table --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product as $item)                
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">edit</a>
                        </td>
                    </tr>
                @empty
                    <td>No data</td>
                @endforelse    
            </tbody>
        </table>

    {{-- modal --}}
    <div class="modal" tabindex="-1" id="exampleModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    
                    <input type="text" name="name" class="form-control" placeholder="Nama Produk">
                    <br>
                    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
                    <br>
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
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