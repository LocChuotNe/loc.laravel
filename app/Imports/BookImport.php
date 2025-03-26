<?php

namespace App\Imports;

use App\Models\Book;
use App\Repositories\Interfaces\BookRepositoryInterface;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class BookImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $rows
    *
    * @return \Illuminate\Database\Eloquent\ToCollection|null
    */

    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository){
        $this->bookRepository = $bookRepository;
    }

    public function collection(Collection  $rows)
    {

        dd($rows);
        
        $data = [];

        foreach ($rows as $row){
            $data[] = [
                'title'         => $row['title'] ?? null,
                'title_en'      => $row['title_en'] ?? null,
                'author'        => $row['author'] ?? null,
                'category_id'   => $row['category_id'] ?? null,
                'year'          => $row['year'] ?? null,
                'stock'         => $row['stock'] ?? null,
                'rental_price'  => $row['rental_price'] ?? null,
                'status'        => $row['status'] ?? null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }
        Log::info('Importing books data:', ['count' => count($data)]);

        
        if (!empty($data)){
            $this->bookRepository->importBooks($data);
        }
    }
}
