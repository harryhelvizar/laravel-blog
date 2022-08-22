@extends('layouts.main')

@section('content')

<div class="container">
        <h2>Halaman Edit Profil</h2>
    <form action="{{ route('profil.update', $profil->id) }}" method="POST">
        @csrf
        @method('put')
            
            <input type="number" name="umur" class="form-control" value="{{ $profil->umur }}">
            <br>
            <input type="text" name="alamat" class="form-control" value="{{ $profil->alamat }}">
            <br>
            <input type="email" name="email" class="form-control" value="{{ $profil->email }}">

         <br>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>

@endsection