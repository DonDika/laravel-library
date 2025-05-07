@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Buku</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700">Judul Buku:</label>
            <input type="text" id="title" name="title" class="w-full p-2 border rounded-lg" value="{{ $book->title }}" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-gray-700">Penulis:</label>
            <input type="text" id="author" name="author" class="w-full p-2 border rounded-lg" value="{{ $book->author }}" required>
        </div>
        <div class="mb-4">
            <label for="stock" class="block text-gray-700">Stok:</label>
            <input type="number" id="stock" name="stock" class="w-full p-2 border rounded-lg" value="{{ $book->stock }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
    </form>
@endsection