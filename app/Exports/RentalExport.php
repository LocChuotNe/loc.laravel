<?php

namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RentalExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Rental::select('id', 'customer_id', 'book_id', 'title', 'title_en', 'rental_date', 'return_date', 'status', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Customer ID', 'Book ID', 'Title', 'Title (EN)', 'Rental Date', 'Return Date', 'Status', 'Created At', 'Updated At'];
    }
}
