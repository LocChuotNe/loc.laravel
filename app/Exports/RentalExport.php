<?php

namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Log;

class RentalExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = Rental::join('customers', 'rentals.customer_id', '=', 'customers.id')
        ->select(
            'rentals.id', 'customers.name as customer_name','rentals.book_id','rentals.title','rentals.title_en','rentals.rental_date','rentals.return_date', 'rentals.status', 'rentals.created_at', 'rentals.updated_at')
        ->get();
        Log::info('Export Rental Data:', $data->toArray());
        return $data;
    }

    public function headings(): array
    {
        return [
            'ID', 'Customer Name', 'Book ID', 'Title', 'Title (EN)',
            'Rental Date', 'Return Date', 'Status', 'Created At', 'Updated At'
        ];
    }
}
