@extends('layouts.app')

@section('content')

<h1>Edit Buku</h1>

<form action="{{ route('books.update',$book->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul</label>
        <input
            type="text"
            name="judul"
            class="form-control"
            value="{{ $book->judul }}">
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input
            type="text"
            name="penulis"
            class="form-control"
            value="{{ $book->penulis }}">
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input
            type="text"
            name="penerbit"
            class="form-control"
            value="{{ $book->penerbit }}">
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input
            type="number"
            name="tahun_terbit"
            class="form-control"
            value="{{ $book->tahun_terbit }}">
    </div>

    <button class="btn btn-primary">
        Update
    </button>

</form>

@endsection