<?php

namespace App\Repositories\Interfaces;

interface RentalRepositoryInterface
{
    public function getAllRentals();
    public function getRentalById($id);
    public function createRental(array $data);
    public function updateRental($id, array $data);
    public function deleteRental($id);
}
