<?php

namespace App\Repositories;

use App\Models\Rental;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\RentalRepositoryInterface;

class RentalRepository implements RentalRepositoryInterface
{
    public function getAllRentals()
    {
        return Rental::with(['customer', 'book'])->get();
    }

    public function getRentalById($id)
    {
        return Rental::with(['customer', 'book'])->findOrFail($id);
    }

    public function createRental(array $data)
    {
        return Rental::create($data);
    }

    public function updateRental($id, array $data)
    {
        $rental = Rental::findOrFail($id);
        $rental->update($data);
        return $rental;
    }

    public function deleteRental($id)
    {
        return Rental::destroy($id);
    }

    public function getRentalsForExport($startDate, $endDate): Collection
    {
        return Rental::whereBetween('rental_date', [$startDate, $endDate])->get();
    }
}

