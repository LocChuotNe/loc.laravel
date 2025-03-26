<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'birthday',
    ];


    public function rentals(){
        return $this->hasMany(Rental::class, 'customer_id', 'id');
    }
}
