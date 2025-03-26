<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
// use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function getAll():collection
    {
        // return Book::with('category')->get();
        return Book::all();
    }

    public function importBooks(array $data): void
    {
        Book::insert($data);
    }
}