<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function __construct()
    {
        // Hanya member yang bisa meminjam buku
        $this->middleware('role:member');
    }

    // Menampilkan daftar buku yang bisa dipinjam
    public function index()
    {
        $books = Book::where('stock', '>', 0)->get();
        return view('loans.index', compact('books'));
    }

    // Proses peminjaman buku
    public function borrow(Request $request, Book $book)
    {
        if ($book->stock > 0) {
            Loan::create([
                'book_id' => $book->id,
                'borrower_id' => Auth::user()->id,
                'loan_date' => now(),
            ]);

            // Kurangi stok buku
            $book->decrement('stock');

            return redirect()->route('loans.index')->with('success', 'Buku berhasil dipinjam.');
        }

        return redirect()->route('loans.index')->with('error', 'Stok buku habis.');
    }
}
