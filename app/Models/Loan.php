<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'book_id',
        'borrower_id',
        'loan_date',
        'return_date'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    public function returnBook()
    {
        return $this->hasOne(ReturnModel::class);
    }


}
