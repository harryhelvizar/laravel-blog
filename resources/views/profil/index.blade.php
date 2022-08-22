@extends('layouts.main')

@section('content')
    <h2>Halaman Profil</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Profil
    </button>
    
    <table class="table">
        <thead>
            <tr>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profil as $item)                
                <tr>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('profil.edit', $item->id) }}" class="btn btn-primary">edit</a>
                    </td>
                </tr>
            @empty
                <td>No data</td>
            @endforelse    
        </tbody>
    </table>


    <div class="modal" tabindex="-1" id="exampleModal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('profil.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    
                    <input type="number" name="umur" class="form-control" placeholder="Input Umur">
                    <br>
                    <input type="text" name="alamat" class="form-control" placeholder="Input Alamat">
                    <br>
                    <input type="email" name="email" class="form-control" placeholder="Input Email">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>


@endsection