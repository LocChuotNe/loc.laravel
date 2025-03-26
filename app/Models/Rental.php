<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','name', 'book_id', 'rental_date', 'return_date', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
