<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'title_en', 'author', 'category_id', 'year','stock', 'status', 'rental_price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
