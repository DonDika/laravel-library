<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'title',
        'author',
        'description',
        'stock',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

}
