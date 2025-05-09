<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Repositories\Interfaces
 */
interface UserRepositoryInterface
{

    public function getAllPaginate();
    public function with(array $relations);
    public function findById($id);
}
