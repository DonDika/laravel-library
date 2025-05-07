<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReturnController extends Controller
{
    // Constructor untuk mengatur middleware
    public function __construct()
    {
        // Hanya admin dan librarian yang bisa mengelola pengembalian
        $this->middleware('role:admin|librarian');
    }

    // Menampilkan daftar buku yang sedang dipinjam
    public function index()
    {
        $loans = Loan::whereNull('return_date')->get();
        return view('returns.index', compact('loans'));
    }

    // Proses pengembalian buku
    public function returnBook(Request $request, Loan $loan)
    {
        $loan->update([
            'return_date' => now(),
        ]);

        // Tambah kembali stok buku
        $loan->book->increment('stock');

        return redirect()->route('returns.index')->with('success', 'Buku berhasil dikembalikan.');
    }
}
