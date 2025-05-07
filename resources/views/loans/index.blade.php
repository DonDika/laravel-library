@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Buku yang Tersedia untuk Dipinjam</h1>

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
                        @if($book->stock > 0)
                            <form action="{{ route('loans.borrow', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Pinjam Buku</button>
                            </form>
                        @else
                            <span class="text-red-500">Stok Habis</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
