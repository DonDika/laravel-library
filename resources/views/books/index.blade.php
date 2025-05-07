@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Buku</h1>

    <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Tambah Buku</a>

    <table class="min-w-full bg-white rounded-lg shadow-lg">
        <thead>
            <tr class="w-full bg-gray-200">
                <th class="py-2 px-4 text-left">Judul</th>
                <th class="py-2 px-4 text-left">Penulis</th>
                <th class="py-2 px-4 text-left">Stok</th>
                <th class="py-2 px-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr class="border-b">
                    <td class="py-2 px-4">{{ $book->title }}</td>
                    <td class="py-2 px-4">{{ $book->author }}</td>
                    <td class="py-2 px-4">{{ $book->stock }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('books.edit', $book->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection