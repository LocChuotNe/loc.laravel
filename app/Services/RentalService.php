<?php

namespace App\Services;

use App\Repositories\Interfaces\RentalRepositoryInterface;

class RentalService
{
    protected $rentalRepository;

    public function __construct(RentalRepositoryInterface $rentalRepository)
    {
        $this->rentalRepository = $rentalRepository;
    }

    public function getAllRentals()
    {
        return $this->rentalRepository->getAllRentals();
    }

    public function getRentalById($id)
    {
        return $this->rentalRepository->getRentalById($id);
    }

    public function createRental(array $data)
    {
        return $this->rentalRepository->createRental($data);
    }

    public function updateRental($id, array $data)
    {
        return $this->rentalRepository->updateRental($id, $data);
    }

    public function deleteRental($id)
    {
        return $this->rentalRepository->deleteRental($id);
    }
}
