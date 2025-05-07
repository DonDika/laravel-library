<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnModel extends Model
{
    protected $fillable = [
        'loan_id',
        'return_at'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }


}
