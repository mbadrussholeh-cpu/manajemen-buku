@extends('layouts.app')

@section('content')

<h1>Data Buku</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
    Tambah Buku
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($books as $book)
        <tr>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>{{ $book->penerbit }}</td>
            <td>{{ $book->tahun_terbit }}</td>

            <td>
                <a href="{{ route('books.edit', $book->id) }}"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('books.destroy', $book->id) }}"
                    method="POST"
                    style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus data?')">
                        Hapus
                    </button>

                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">
                Belum ada data buku
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection