@extends('layouts.main')

@section('content')
    <h2>Halaman Edit Product</h2>
    
    {{-- form --}}
    <form action="{{ route('product.update', $product->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="modal-body">
            
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            <br>
            <input type="text" name="deskripsi" class="form-control" value="{{ $product->deskripsi }}">
            <br>
            <input type="number" name="jumlah" class="form-control" value="{{ $product->jumlah }}">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>

@endsection