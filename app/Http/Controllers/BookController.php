<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class BookController extends Controller
{
    //constructor untuk mengatur middleware
    public function __construct()
    {
        $this->middleware('role:admin|librarian');
    }

        // Menampilkan daftar buku
        public function index()
        {
            $books = Book::all();
            return view('books.index', compact('books'));
        }
    
        // Menampilkan form tambah buku
        public function create()
        {
            return view('books.create');
        }
    
        // Menyimpan buku baru ke database
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'author' => 'required',
                'stock' => 'required|integer|min:0',
            ]);
    
            Book::create($request->all());
    
            return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
        }
    
        // Menampilkan form edit buku
        public function edit(Book $book)
        {
            return view('books.edit', compact('book'));
        }
    
        // Mengupdate data buku di database
        public function update(Request $request, Book $book)
        {
            $request->validate([
                'title' => 'required',
                'author' => 'required',
                'stock' => 'required|integer|min:0',
            ]);
    
            $book->update($request->all());
    
            return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
        }
    
        // Menghapus buku dari database
        public function destroy(Book $book)
        {
            $book->delete();
    
            return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
        }
    



}
